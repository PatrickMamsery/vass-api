<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\UserTrait;

class Authswitch extends Component
{
    use UserTrait;

    public $flag = true;
    public $email ;

    protected $rules = [
        'email' => 'required|email',
    ];
    
    public function requestNewPassword()
    {
        $this->validate();

        if($this->email != ""){
            $this->resetPassword($this->password);
        }
    }
    public function switch()
    {
        $this->flag = !$this->flag;
    }
    
    public function render()
    {
        return view('livewire.authswitch');
    }
}
