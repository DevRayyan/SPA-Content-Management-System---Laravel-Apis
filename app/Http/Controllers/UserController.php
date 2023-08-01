<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*()_+]).{8,}$/'
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors(),
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken($request->email)->plainTextToken;
        return response()->json([
            'success' => true,
            'token' => $token,
            'msg' => ""
        ]);
    }

    public function login(Request $request)
    {
        $expiresAt = now()->addMinutes(30);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*()_+]).{8,}$/'
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors(),
            ]);
        }

        $user = User::where("email", $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->email,['expires_at' => $expiresAt])->plainTextToken;

            return response()->json([
                'success' => true,
                'data' => $user,
                'token' => $token
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => "Invalid Credentials",
                'ddd' => $user->password
            ]);
        }
    }

    // public function logout()
    // {
    //     $user = auth()->user()->tokens()->delete();
    //     if (!$user) {
    //         return response()->json([
    //             'success' => false,
    //             'msg' => 'User not found'
    //         ]);
    //     }
    //     $user->tokens()->delete();
    //     return response()->json([
    //         'success' => true,
    //         'msg' => 'Logout successful'
    //     ], 200);
    // }
    public function logout()
    {
        $loggedUserId = auth()->id();
        $user = User::find($loggedUserId);
        $user->tokens()->delete();
        if ($user) {
            return response()->json([
                'success' => true,
                'msg' => 'Logout successful'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'msg' => 'User not found'
        ]);
    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*()_+]).{8,}$/'
            ],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors(),
            ]);
        }
        $loggedUserId = auth()->id();
        $user = User::find($loggedUserId);

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return response()->json([
            'success' => true,
            'msg' => "Password Sucessfully Changed"
        ], 200);
    }

    public function changeEmailAndName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email'
        ]);
        $validateEmail = Validator::make($request->all(), [
            'email' => 'email|unique:users'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors(),
            ]);
        }

        $loggedUserId = auth()->id();
        $loggedUser = User::find($loggedUserId);
        if ($loggedUser) {
            $loggedUser->name = $request->name;
            if ($loggedUser->email != $request->email) {
                if ($validateEmail->fails()) {
                    return response()->json([
                        'success' => false,
                        'msg' => $validator->errors(),
                    ]);
                } else {
                    $loggedUser->email = $request->email;
                }
            }
            $loggedUser->save();
            return response()->json([
                'success' => true,
                'msg' => "Email or Full Name Sucessfully Changed"
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => "user not exist"
            ]);
        }
    }



    public function updatePlan()
    {
        $userId = auth()->id();
        $user = User::find($userId);
        if ($user) {

            $user->plan = 1;
            $user->save();
            return response()->json([
                'success' => true,
                'msg' => "succeed"
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => "user not exist"
            ]);
        }
    }
}
