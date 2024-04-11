<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class PassportAuthController extends Controller
{
    /**
     * Create a new user by registration
     *
     * This endpoint enables user to register themselves to the application and at the same time authenticates them on successful registration
     *
     * @unauthenticated
     *
     * @bodyParam name string required The name of user
     * @bodyParam email string required Email of the user, should be valid email, unique to the users table
     * @bodyParam password string required Must be at least 6 characters
     * @bodyParam password_confirmation string required Must be same to the password value
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string',
            'mname' => 'nullable|string',
            'lname' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'address' => 'nullable|string',
            'role_id' => 'required|exists:roles,id',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $user = new User([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address ? $request->address : null,
            'role_id' => $request->role_id,
            'image' => $request->image ? $request->image : null, // default image for all users
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        $token = $user->createToken('AuthToken')->accessToken;

        $response = [
            'name' => $user->username,
            'token' => $token,
        ];

        return $this->sendResponse($response, 'User registered successfully.');
    }

    /**
     * POST api/login
     *
     * Logs-in user(s) to the specified dashboard
     *
     * @unauthenticated
     * @bodyParam phone string required Must a valid phone number, unique to the users table
     * @bodyParam password string required Must be at least 6 characters
     *
     */
    public function login(Request $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->accessToken;

            return response(
                [
                    'token' => $token,
                    'userData' => [
                        'id' => Auth::user()->id,
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'phone' => Auth::user()->phone,
                        'role' => Auth::user()->role->name,
                        // 'image' => Auth::user()->image,
                    ]
                ], 200
            );
        }

        return response(['error' => 'Unauthorized'], 401);
    }

}
