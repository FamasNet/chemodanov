@extends('layouts.master')

@section('content')
    
    @foreach ($posts as $post)
        <div class="card my-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">
                        {{ $post->body }}
                    </p>
                    

                    <a href="/posts/{{ $post->id  }} " class="btn btn-primary">Read More →</a>
                </div>
                
              

                <div class="card-footer text-muted">
                
                Posted on <span class="text-info" > {{ $post->created_at->format('jS \\of F Y h:i:s')  }} </span>
                
                by <span class="text-info" > {{ $post->user->name  }}</span> 
                
            </div>
      </div>

    @endforeach
<script>

</script>
@endsection