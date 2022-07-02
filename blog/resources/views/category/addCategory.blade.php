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
        <h1>Tambah Category</h1>
    </div>
    <div class="bg-dark">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th scope="col">Semua Category</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach ($category as $c)
                <tbody>
                    <td scope="row">{{ $c->name }}</td>
                    <td scope="row"><a class="text-decoration-none" href="/category/hapus/{{ $c->id }}">Hapus</a></td>
                    <td  scope="row"> <a class="text-decoration-none" href="/category/edit/{{ $c->id }}">Edit</a></td>
                </tbody>
            @endforeach
        </table>
    </div>
    <form action="/category/tambah" method="POST">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Category</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 d-none">
            <label for="exampleInputEmail1" class="form-label">user_id</label>
            <input name="user_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    
@endsection