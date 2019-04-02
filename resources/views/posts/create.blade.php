@extends('layouts.master')

@section('content')
    
        <div id='create' class="col-sm-12 blog-main">
            <h1>Create new post:</h1>

            <hr/>

            <form action="/posts" class="form-group">
            @csrf

                <div class="form-group">

                    <label for="title"> Title: </label>

                    <input type="text" id="title"  name="title"   class="form-control" required>

                </div>

                <div class="form-group">

                    <label for="body">Body:</label>

                    <textarea name="body" placeholder="Write your post here"  class="form-control" required></textarea>

                </div>

                <div class="form-group">

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Publish post</button>

                </div>



            </form>


            @include('layouts.errors')


        </div>


@endsection