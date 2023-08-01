<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function FetchPost()
    {
        $PostRecord = Post::where("status", 1)->get();

        return response()->json([
            'success' => true,
            'msg' => "success",
            'data' => $PostRecord,
        ]);
    }
    public function FetchSinglePost(Request $req)
    {
        $PostRecord = Post::where("id", $req->id)->get();
        $userId = auth()->id();
        $user = User::find($userId);
        if ($user) {
            if ($user->plan == 0) {
                if ($PostRecord[0]->plan == 0) {
                    return response()->json([
                        'success' => true,
                        'msg' => "success",
                        'data' => $PostRecord,

                    ]);
                } elseif ($PostRecord[0]->plan == 1) {
                    return response()->json([
                        'success' => false,
                        'msg' => "no entry",
                        'data' => null
                    ]);
                }
            } elseif ($user->plan == 1) {
                return response()->json([
                    'success' => true,
                    'msg' => "success",
                    'data' => $PostRecord,
                    'plan' => $user
                ]);
                return response()->json([
                    'success' => true,
                    'msg' => "success",
                    'data' => $PostRecord,
                    'plan' => $user
                ]);
            } else {
            }
        } else {
            if ($PostRecord[0]->plan == 0) {
                return response()->json([
                    'success' => true,
                    'msg' => "success",
                    'data' => $PostRecord,

                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'msg' => "no entry",
                    'data' => null
                ]);
            }
        }
    }
    public function SearchPost(Request $req)
    {
        $query = $req->q;

        $PostDetails = Post::where("title", 'like', '%' . $query . '%')->paginate(10);

        return response()->json([
            'success' => true,
            'msg' => "success",
            'data' => $PostDetails,
        ]);
    }
}
