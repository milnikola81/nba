<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        @yield('title')
    </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">

    <link href="/css/nba.css" rel="stylesheet">

  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="/teams">Teams</a>
          <a class="nav-link active" href="/news">News</a>
          <a class="nav-link active" href="/news/create">Add news</a>
          @if(auth()->check())
            <a class="nav-link ml-auto" href="/logout">{{auth()->user()->name}}</a>
            <a class="nav-link active ml-auto" href="/logout">Logout</a>
         @else
            <a class="nav-link ml-auto" href="/login">Login</a>
            <a class="nav-link ml-auto" href="/register">Register</a>
         @endif
        </nav>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-sm-8 blog-main" style="margin-top: 2rem">

        @yield('content')

        </div> <!-- end blog-main -->

        <div class="col-sm-3 offset-sm-1 blog-sidebar">       
          <div class="sidebar-module" style="margin-top: 2rem; background: white; padding: 0.5rem">
            <h4>See news about</h4>
            <ol class="list-unstyled">
            @foreach ($teams as $team)
              <li>
                <a href="/news/team/{{ $team->id }}"> {{$team->name}} </a>
                <!-- setovano u AppServiceProvider boot() -->
              </li>
            @endforeach
            </ol>
          </div><!-- end sidebar-module -->
        </div><!-- end blog-sidebar -->

      </div><!-- end row -->

    </div><!-- end container -->


  </body>

</html>

