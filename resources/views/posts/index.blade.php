@extends('layouts.master')

@section('content')
    
    @foreach ($posts as $post)
        <div class="card my-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">
                        {{ $post->body }}
                    </p>
                    
                        <!-- <button type ="button" class="btn btn-light like"><img width = '30px' height = '30px' src="https://im0-tub-ru.yandex.net/i?id=e06b31de80b83345c631816b7bec28e0&n=13&exp=1"></button>
                        <button class="btn btn-light dislike">Dislike:</button> -->
                 

                    <a href="/posts/{{ $post->id  }} " class="btn btn-primary">Read More →</a>
                </div>
                
              

                <div class="card-footer text-muted">
                
                Posted on <span class="text-info" > {{ $post->created_at->format('jS \\of F Y h:i:s')  }} </span>
                
                by <span class="text-info" > {{ $post->user->name  }}</span> 
                
            </div>
      </div>

    @endforeach

    <div class="pagination">
        {{
            $posts->links()
        }}
    <div>    
@endsection