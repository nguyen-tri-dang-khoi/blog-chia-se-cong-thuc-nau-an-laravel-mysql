<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //
    public function create(Request $request){
        $comment = new Comment;
        $comment->user_id=Auth::user()->id;
        $comment->post_id=$request->id;
        $comment->comment = $request->comment;
        $comment->save();

        return response()->json([
            'success'=>true,
            'message'=>'comment added',
        ]);
    }
    public function update(Request $request){
        $comment = Comment::find($request->id);
        // check if user editing hit own comments
        if($comment->id != Auth::user()->id){
            return response()->json([
                'success'=>false,
                'message'=>'unauthorized success'
            ]);
        }
        $comment ->comment = $request->comment;
        $comment->udpate();

        return response()->json([
            'success'=>true,
            'message'=>'comment edited'
        ]);
    }
    public function delete(Request $request){
        $comment = Comment::find($request->id);
        // check if user editing hit own comments
        if($comment->id != Auth::user()->id){
            return response()->json([
                'success'=>false,
                'message'=>'unauthorized success'
            ]);
        }
        $comment->delete();
        return response()->json([
            'success'=>true,
            'message'=>'comment deleted'
        ]);
    }
    public function comments(Request $request){
        $comments = Comment::where('post_id',$request->id)->get();
        //show user for each comments
        foreach($comments as $comment){
            $comment->user;
        }
        return response()->json([
            'success' => true,
            'comments' => $comments
        ]);
    }
}
