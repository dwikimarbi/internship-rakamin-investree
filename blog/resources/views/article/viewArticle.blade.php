@extends('layouts.appnew')
@section('title')
    Article Detail
@endsection
@section('content')
        <!-- Page Header-->
        @foreach ($articles as $a)
        <header class="masthead" style="background-image: url({{ url('image/'. $a->image) }})">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{{ $a->title }}</h1>
                            <span>{{ $a->category->name }}</span>
                            <span class="meta">
                                Posted by
                                <a href="#!">{{ $a->user->name }}</a>
                                {{ $a->created_at->format('d, M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>{{ $a->content }}</p>

                    </div>
                </div>
            </div>
        </article>
        @endforeach
@endsection