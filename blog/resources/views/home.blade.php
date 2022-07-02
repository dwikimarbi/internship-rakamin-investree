

@extends('layouts.apphome')

        <!-- Footer-->
@section('title')
    Home Page
    
@endsection
@section('content')
<header class="masthead" style="background-image: url({{ url('image/home.jpg') }})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Dashboard</h1>
                    <span class="subheading">Welcome {{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <h2>Your Article</h2>
            <hr>
            <!-- Post preview-->
            @foreach ($articles as $a)
                <div class="post-preview">
                    <a href="article/detail/{{ $a->id }}">
                        <h2 class="post-title">{{ $a->title }}</h2>
                        <h3 class="post-subtitle">{{ \Illuminate\Support\Str::limit($a->content, 50, $end='...')  }}</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">{{ $a->user->name }}</a>
                        {{ $a->created_at->format('d, M Y') }}
                    </p>
                    
                </div>
                <div class="d-flex mt-0 justify-content-between" style="width: 7rem; padding:0;">
                    <p class="mr-2"><a class="text-card text-decoration-none" href="article/update/{{ $a->id }}">Edit</a></p>
                    <p class=""><a class="text-card text-decoration-none" href="article/delete/{{ $a->id }}">Delete</a></p>
                </div>
                <!-- Divider-->
                
                <hr class="mt-0" />
            @endforeach
            
            <div class="d-flex justify-content-end mb-4">{{ $articles->links() }}</div>
        </div>
    </div>
</div>
@endsection