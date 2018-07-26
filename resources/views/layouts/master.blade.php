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
          <a class="nav-link active" href="/teams">Home</a>
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

        </div>
      </div>
    </div>


  </body>

</html>

