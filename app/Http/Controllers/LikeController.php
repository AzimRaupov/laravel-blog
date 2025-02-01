<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    function add(Request $request)
    {
        $user_id=Auth::user();
        $post_id=$request->input('id');
        Like::create([
            'user_id'=>$user_id->id,
            'post_id'=>$post_id,
            'status'=>true
        ]);
return response()->json(['status'=>'ok'],200);
    }
    function offlike(Request $request)
    {
        $user_id = Auth::user();


        $like = Like::where(['id' => $request->input('id'), 'user_id' => $user_id->id])->first();



            $like->delete();
        return response()->json(['status'=>'s'],200);
    }
}
