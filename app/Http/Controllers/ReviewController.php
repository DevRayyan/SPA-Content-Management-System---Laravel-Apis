<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ReviewController extends Controller
{
    public function CreateReview(Request $req)
    {
        $ReviewCount = Review::where('email', $req->email)->count();
        if ($ReviewCount >= 2) {
            return response()->json([
                'success' => false,
                'msg' => "limitend"
            ]);
        }
                $validator = Validator::make($req->all(), [
                    'name' => 'required|string|max:100',
                    'occupation' => 'string|max:100',
                    'email' => 'required|email',
                    'msg' => 'required|string|min:5|max:250',
                    'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'success' => false,
                        'msg' => $validator->errors(),
                    ]);
                }
                $user = auth()->user();
                if ($req->email != $user->email) {
                    return response()->json([
                        'success' => false,
                        'msg' => ["email"=>"invalid email address"],
                    ]);
                }
                if($req->Hasfile('image')){
                    $image =  $req->file('image')->store('public/review');
                    $imageUrl = Storage::url($image);
                    $imageUrl = str_replace('public/', '', $imageUrl);
                }else{
                    $image ="none";
                }
                if($req->Has('occupation')){
                    $occp = $req->occupation;
                }else{
                    $occp = null;
                }
              
        $review = Review::create([
            'name' => $req->name,
            'image' => $imageUrl,
            'occupation' => $occp,
            'email' =>$req->email,
            'msg' => $req->msg,
        ]);
                return response()->json([
                    'success' => true,
                    'msg' => "send"
                ]);
    }

    public function FetchReview()
    {
        $ReviewRecord = Review::inRandomOrder()->take(5)->get();

        return response()->json([
            'success' => true,
            'msg' => "success",
            'data' => $ReviewRecord
        ]);
    }
}