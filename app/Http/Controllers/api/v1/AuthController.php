<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

/**
 * response_message() and response_token_message() can be found in Controller.php
 */

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        return $this->response_message('User created', 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return $this->response_message('Bad credentials', 401);
        } else {
            $token = $user->createToken('P@ssw0rd')->plainTextToken; 
        }

        return $this->response_token_message($token, 'User logged in', 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
        return $this->response_message('User logged out', 200);
    }
}
