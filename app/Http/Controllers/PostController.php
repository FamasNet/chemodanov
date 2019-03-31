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

        $posts = Post::all();

        return view('posts.index')->with('posts', $posts);

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
            'user_id' => '1',
        ]);

        return redirect()->home();

    }
}
