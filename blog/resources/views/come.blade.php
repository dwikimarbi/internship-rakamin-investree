<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if(Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">login</a>
                            </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
              @endif
            </ul>
          </div>
        </div>
      </nav>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach ($articles as $article)
                    <div class="card mb-3">
                        <img class="m-auto rounded mt-2" style="width: 10rem" src="{{ asset('image/' . $article->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><small class="text-muted">{{ $article->category->name ?? 'nothing'}}</small></p>
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($article->content, 150, $end='...') }}</p>
                            <div class="d-flex  justify-content-between text-muted " style="width: 10rem">
                                <p class=""><a class="text-card text-decoration-none" href="article/detail/{{ $article->id }}">detail</a></p>
                            </div>
                        </div>
                    </div>
               @endforeach
    </div>
</body>
</html>

