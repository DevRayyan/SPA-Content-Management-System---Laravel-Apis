<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PasswordResetController extends Controller
{
    public function SendResetPasswordEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        $email = $request->email;
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors(),
            ]);
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'msg' => "Email does not exist",
            ]);
        }

        $token = Str::random(40);


        PasswordReset::updateOrCreate(
            ['email' => $email,],
            [
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        Mail::send('reset', ['token' => $token, 'name' => $user->name], function (Message $message) use ($email) {
            $message->subject('Reset Your Password');
            $message->to($email);
        });

        return response()->json([
            'success' => true,
            'msg' => "Reset Link Sended",
        ], 200);
    }

    public function Reset(Request $request, $token)
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

        $formatted = Carbon::now()->subMinutes(10)->toDateTimeString();
        PasswordReset::where('created_at', '<=', $formatted)->delete();

        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset) {
            return response()->json([
                'success' => false,
                'msg' => "Token is invalid or expired",
            ]);
        }

        $user = User::where('email', $passwordReset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // delete token after resetting password
        PasswordReset::where('email', $user->email)->delete();

        return response()->json([
            'success' => true,
            'msg' => "Successfully reset your password",
        ], 200);
    }
}
