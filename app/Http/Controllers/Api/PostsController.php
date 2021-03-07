<?php

namespace App\Http\Controllers\Api;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Contracts\JWTSubject;

class PostsController extends Controller
{
    //
    public function create(Request $request){
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->desc = $request->desc;
        // check if a post has photo
        if($request->photo != ''){
            // choose a unique name for photo
            $photo = time().'jpg';
            // need to link storage folder to public
            file_put_contents('storage/posts/'.$photo,base64_decode($request->photo));
            $post->photo = $photo;
        }
        $post->save();
        $post->user;
        return response()->json([
            'success' => true,
            'message' => 'posted',
            'post' => $post
        ]);
    }
    public function update(Request $request){
        $post = Post::find($request->id);
        // check if user is editing hit own post
        if(Auth::user()->id != $request->id){
            return response()->json([
                'success'=>false,
                'message'=>'unauthorized success',
            ]);
        }
        $post->desc = $request->desc;
        $post->update();
        return response()->json([
            'success'=>true,
            'message'=>'post editted'
        ]);
    }
    public function delete(Request $request){
        $post = Post::find($request->id);
        // check if user is editing hit own post
        if(Auth::user()->id != $request->id){
            return response()->json([
                'success'=>false,
                'message'=>'unauthorized success',
            ]);
        }
        if($post->photo != ''){
            Storage::delete('public/posts/'.$post->photo);
        }
        $post->delete();
        return response()->json([
            'success'=>true,
            'message'=>'post deleted'
        ]);
    }
    public function posts(){
        $posts = Post::orderBy('id','desc')->get();
        foreach($posts as $post){
            // get user of post
            $post->user;
            // comments count
            $post['commentCounts'] = count($post->comments);
            // like counts
            $post['likeCounts'] = count($post->likes);
            // check if user like his own post
            $post['selfLike'] = false;
            foreach($post->likes as $like){
                if($like->user_id == Auth::user()->id){
                    $post['selfLike'] = true;
                }
            }
        }
        return response()->json([
            'success'=>true,
            'post'=>$posts,
        ]);
    }
}
