<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function SendMessage(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'msg' => 'required|string|min:5|max:250',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'msg' => $validator->errors(),
            ]);
        }
     
        $Message = Message::create([
            'name' => $req->name,
            'email' => $req->email,
            'msg' => $req->msg,
        ]);

        return response()->json([
            'success' => true,
            'msg' => "send"
        ]);
    }

}
