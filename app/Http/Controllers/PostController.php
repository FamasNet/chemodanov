<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\UserLike;

class PostController extends Controller
{

    
    public function __construct(){
    
        $this->middleware('auth')->except(['index', 'show']);

    }

    
    public function index(){

        $posts = Post::paginate(3);

        return view('posts.index', compact('posts'));

    }

    public function show(Post $post){

        return view('posts.show')->with('post', $post);

    }

    public function create(){

        return view('posts.create');

    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required|min:10',
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
            'count_like' => '0',
            'count_dislike' => '0',
        ]);

        return redirect()->home();

    }

    public function minusDislike(Request $request){

        $idPost = $request->postId;
        $idUser = $request->userId;
        
        $UserLike = UserLike::where('user_id', $idUser)
                            ->where('post_id', $idPost)
                            ->first();

        if( $UserLike === null ){
            UserLike::create([
                'user_choice' => 0,
                'user_id' => $idUser,
                'post_id' => $idPost,
            ]);
        }  else {
            $UserLike->user_choice = 0;    
        }
    
        $post = Post::find($idPost);
        $post->count_dislike--;
        $post->save(); 

        $dislike = $post->count_dislike;

        return [
            'dislike' => $dislike, 
        ];

    }

    public function plusDislike(Request $request){
        
        $idPost = $request->postId;
        $idUser = $request->userId;
        

        $UserLike = UserLike::where('user_id', $idUser)
                            ->where('post_id', $idPost)
                            ->first();

        if( $UserLike === null ){
            UserLike::create([
                'user_choice' => -1,
                'user_id' => $idUser,
                'post_id' => $idPost,
            ]);
        }  else {
            $UserLike->user_choice = -1;     
        }

        
        $post = Post::find($idPost);
        $post->count_dislike++;
        $post->save();

        $dislike = $post->count_dislike;

        return [
            'dislike' => $dislike, 
        ];


    }

    public function minusLike(Request $request){

        $idPost = $request->postId;
        $idUser = $request->userId;
        
        $UserLike = UserLike::where('user_id', $idUser)
                            ->where('post_id', $idPost)
                            ->first();

        if( $UserLike === null ){
            UserLike::create([
                'user_choice' => 0,
                'user_id' => $idUser,
                'post_id' => $idPost,
            ]);
        }  else {
            $UserLike->user_choice = 0;     
        }

        $post = Post::find($idPost);
        $post->count_like--;
        $post->save();

        $like = $post->count_like;

        return [
            'like' => $like, 
        ];

    }

    public function plusLike(Request $request){

        $idPost = $request->postId;
        $idUser = $request->userId;

        $UserLike = UserLike::where('user_id', $idUser)
                            ->where('post_id', $idPost)
                            ->first();

        if( $UserLike === null ){
            UserLike::create([
                'user_choice' => 1,
                'user_id' => $idUser,
                'post_id' => $idPost,
            ]);
        }  else {
            $UserLike->user_choice = 1;     
        }
        
        $post = Post::find($idPost);
        $post->count_like++;
        $post->save();
        $like = $post->count_like;

        return [
            'like' => $like, 
        ]; 
 
    }

    public function getLike(Request $request){
 
        $id = $request->postId;
        $post = Post::find($id);
        $like = $post->count_like;

        return [
                'like' => $like
        ]; 
    }

    public function getDislike(Request $request){

        $id = $request->postId;
        
        $post = Post::find($id);

        $dislike = $post->count_dislike;

        return [
                'dislike' => $dislike
        ]; 
    }

    public function userLike (Request $request){

        $idPost = $request->postId;
        $idUser = $request->userId;

        $UserLike = UserLike::where('user_id', $idUser)
                            ->where('post_id', $idPost)
                            ->first();
                            
        if($UserLike === null){
            return[
                'statusLike' => false,
                'statusDislike' => false,
            ];
        } else {

            if($UserLike->user_choice === 0){
                return[
                    'statusLike' => false,
                    'statusDislike' => false,
                ];
            }elseif($UserLike->user_choice === 1){
                return[
                    'statusLike' => true,
                    'statusDislike' => false,
                ];
            } elseif ($UserLike->user_choice === -1){
                return[
                    'statusLike' => false,
                    'statusDislike' => true,
                ];
            }
        } 
    }

}
