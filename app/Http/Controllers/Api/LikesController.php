<?php

namespace App\Http\Controllers\Api;
use App\Like;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    //
    public function likes(Request $request){
        $like = Like::where('post_id',$request->id)->where('user_id',Auth::user()->id)->get();
        // check if it return 0 then this post is not liked else unliked
        if(count($like) > 0){
            $like[0] -> delete();
            return response()->json([
                'success' => true,
                'message' => 'unliked'
            ]);
        }
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->post_id = $request->id;
        $like->save();

        return response()->json([
            'success' => true,
            'message' => 'liked'
        ]);
    }
}
