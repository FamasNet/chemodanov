@extends('layouts.master')

@section('content')

<div id='login' class="col-sm-12 blog-main">
            <h1>Sign in:</h1>

            <hr/>

            <form method="POST" action="/login" >
            @csrf


                <div class="form-group">

                    <label for="email">Email:</label>

                    <input type="email" id="email"  name="email"  class="form-control" required>

                </div>

                <div class="form-group">

                    <label for="password">Password:</label>

                    <input type="password" id="password"  name="password"   class="form-control" required>

                </div>

                <div class="form-group">

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                </div>



            </form>


            @include('layouts.errors')


        </div>
@endsection