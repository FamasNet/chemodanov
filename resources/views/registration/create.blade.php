@extends('layouts.master')

@section('content')

<div class="col-sm-12 blog-main">
            <h1>Registration:</h1>

            <hr/>

            <form method="POST" action="/registration" >
            @csrf

                <div class="form-group">

                    <label for="name"> Name: </label>

                    <input type="text" id="name"  name="name"   class="form-control" required>

                </div>

                <div class="form-group">

                    <label for="email">Email:</label>

                    <input type="email" id="email"  name="email"   class="form-control" required>

                </div>

                <div class="form-group">

                    <label for="password">Password:</label>

                    <input type="password" id="password"  name="password"   class="form-control" required>

                </div>

                <div class="form-group">

                    <label for="password_confirmation">Password confirmation:</label>

                    <input type="password" id="password_confirmation"  name="password_confirmation"   class="form-control" required>

                </div>

                <div class="form-group">

                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

                </div>



            </form>


            @include('layouts.errors')


        </div>
@endsection