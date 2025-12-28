<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidation;
use App\Http\Resources\UserResourc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(UserValidation $userValidation)
    {

        $userValidation['password'] = Hash::make($userValidation['password']);

        $user = User::create($userValidation->toArray());

        $token = $user->createToken('auth_token');

        return response()->json([
            'data' => new UserResourc($user),
            'token' => $token->plainTextToken,
            'token_type' => 'Bearer'
        ], 201);
    }

}
