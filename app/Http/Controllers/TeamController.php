<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
public function CreateTeam(Request $req){
    $validator = Validator::make($req->all(), [
        'name' => 'required|string|max:100',
        'occupation' => 'required|string|max:100',
        'email' => 'required|email',
        'link' => 'url',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

    ]);
    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'msg' => $validator->errors(),
        ]);
    }
    if($req->Hasfile('image')){
        $image =  $req->file('image')->store('public/team');
        $imageUrl = Storage::url($image);
        $imageUrl = str_replace('public/team/', '', $imageUrl);
    }else{
        $image = null;
    }
    if($req->has('link'))
    {
        $link = $req->link;
    }else{
        
        $link = null;
    }
    Team::create([
        'name' => $req->name,
        'image' => $imageUrl,
        'occupation' => $req->occupation,
        'email' =>$req->email,
        'link' =>$link,
    ]);
            return response()->json([
                'success' => true,
                'msg' => "send"
            ]);
}

public function FetchTeam()
{
    $TeamRecord = Team::all();

    return response()->json([
        'success' => true,
        'msg' => "success",
        'data' => $TeamRecord
    ]);
}
}
