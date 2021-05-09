<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('css/bootstrap1.min.css')}}" >
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
      <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="index.php">
    Film Society
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="movies/create">Movie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="actor">Actor/Actress</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="director"></a>
      </li>

    </ul>

  </div>
</nav>
      </div>

      <div class="container">
        <div class="row">
    <div class="col-6"><a class="btn btn-primary" href="movies/create" role="button">ADD MOVIES</a></div>
    <div class="col-6">  <a class="btn btn-primary" href="movies/show" role="button">SHOW MOVIE LIST</a></div>
  </div>
    <div class="row">
<div class="col-6"><a class="btn btn-primary" href="/actor" role="button">ADD ACTOR/ACTORS</a></div>
<div class="col-6">  <a class="btn btn-primary" href="/actorshow" role="button">SHOW ACTOR LIST</a></div>
</div>
  <div class="row">
<div class="col-6"><a class="btn btn-primary" href="/director" role="button">ADD DIRECTOR</a></div>
<div class="col-6">  <a class="btn btn-primary" href="/directorshow" role="button">SHOW DIRECTOR LIST</a></div>
</div>


      </div>



        <script src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
<script src="{{asset('js/popper.min.js')}}" ></script>
<script src="{{asset('js/bootstrap.min.js')}}" ></script>
    </body>
</html>
