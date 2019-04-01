<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    
    public function __construct(){
    
        $this->middleware('auth')->except(['index', 'show']);

    }

    
    public function index(){

        $posts = Post::paginate(5);

        $like = Post::get('count_like');

        $dislike = Post::get('count_dislike');       

        return view('posts.index', compact('posts', 'like', 'dislike'));

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

        $id = $request-only('postId');
   
        $post = Post::find($id);

        $dislike = $post->count_dislike;
        
        $dislike = $dislike--;

        $post->count_dislike = $dislike;

        return [
            'dislike' => $dislike, 
        ];

    }

    public function plusDislike(Request $request){
        
        $id = $request-only('postId');
   
        $post = Post::find($id);

        $dislike = $post->count_dislike;
        
        $dislike = $dislike++;

        $post->count_dislike = $dislike;

        return [
            'dislike' => $dislike, 
        ];


    }

    public function minusLike(Request $request){

        $id = $request-only('postId');
   
        $post = Post::find($id);

        $like = $post->count_like;
        
        $like = $like--;

        $post->count_like = $like;

        return [
            'like' => $like, 
        ];

    }

    public function plusLike($id){

        /* 
        $post = Post::find($id);

        $like = $post->count_like;
        
        $like = $like++;

        $post->count_like = $like;
 */
        $id++;
        return [
            'like' => $id, 
        ];

    }
}
