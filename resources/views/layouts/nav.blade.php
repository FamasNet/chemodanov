<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a href="http://project.chemodanov/" class="navbar-brand">Home</a>
        
        @auth
            <a href="/posts/create " class=" ml-3 btn btn-primary">Create post</a>
        @endauth

        <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto"></ul>
        
        <ul class="navbar-nav ml-auto">
            @auth
                <li class="nav-item nav-link">
                    {{ Auth::user()->name }}
                </li>

                <li class="nav-item nav-link">
                    <a href="http://project.chemodanov/logout">Logout</a>
                </li>
            @endauth

            @guest
                <li class="nav-item">
                    <a href="http://project.chemodanov/login" class="nav-link">Login</a>
                </li>

                <li class="nav-item">
                <a href="http://project.chemodanov/registration" class="nav-link">Register</a>
            </li>
            @endguest
        </ul>
  </div>
  </div>
</nav>