@extends('layouts.master')

@section('content')
    
    <div class="card my-4">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">
                    {{ $post->body }}
                </p>

            </div>

            <div class="card-footer text-muted">
                    
                Posted on <span class="text-info" > {{ $post->created_at->format('jS \\of F Y h:i:s')  }} </span>
                    
                by <span class="text-info" > {{ $post->user->name  }}</span> 
                
            </div>
    </div>
    
    <div class="comments card my-4">

        <div class="card-body">

            <h2 class="card-title">Comments</h2>
         </div>    

            <ul class="list-group">

                @foreach ($post->comments as $commnent)

                    <li class="list-group-item">      

                        {{$commnent->body}}

                    </li>
            
                @endforeach
            </ul>
    </div>

    @auth
        <div class="blog-main">
                <form action="/posts/{{ $post->id }}/comments" method = "POST" >
                    @csrf 

                    <div class="form-group">

                        <textarea name="body" placeholder = "Write your comment here"  class = "form-control"required></textarea>
                    
                    </div>

                    <div class="form-group">
                        
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Post comment</button>

                    </div> 

                </form>
                @include('layouts.errors')
        </div>
    @endauth

            
@endsection