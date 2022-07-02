@extends('layouts.app')
@section('content')
<div class="col-md-10 m-auto">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br/>
        @endforeach
    </div>
    @endif
    <div>
        <h1>Tambah Article</h1>
    </div>
    <form action="/article/tambah" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input  name="image" class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-2">
            <label for="formFile" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected>Open this select menu</option>
                @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                
            </select>
        </div>
        <div class="mb-3 d-none">
            <label for="exampleInputEmail1" class="form-label">user_id</label>
            <input name="user_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    
@endsection