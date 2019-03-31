<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Application</title>

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('js/app.js') }}"></script> 

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link 
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
        
    <link
        href="form-validation.css"
        rel="stylesheet"
    >
  </head>

<body>
<div id="app">
  @include('layouts.nav')

<example-component></example-component>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      @yield('content')
    </div>
    </div>
  </div>
</div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>