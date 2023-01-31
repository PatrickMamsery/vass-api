<?php

namespace App\Traits;

use App\Mail\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

trait UserTrait{

    public function resetPassword(String $email): bool
    {
        $user = User::where('email', $email)->where("role_id",2)->first();
        if(!$user) return false;

        $new_password = generateRandomString();
        $user->password = bcrypt($new_password);

        if($user->save()){
            Mail::to($email)->send(new PasswordReset($email,$new_password));
            if (Mail::failures()) {
                Log::info("Mail failed");
                return false;
            }else return true;
        }else return false;
        
    }
}