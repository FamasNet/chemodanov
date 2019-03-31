<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post,Request $request ){

        $request->validate([
            'body' => 'required|min:10',
        ]);
        
        $post->addComment(request('body'));

        return back();

    }
}
