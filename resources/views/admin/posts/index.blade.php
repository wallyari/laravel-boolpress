@extends('layouts.app')

@section('content')
<div class="container">
    <div class="m-3 d-flex justify-content-end">
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Add New Post</a>  
    </div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>
                    <a href="{{route('admin.posts.show',['post'=> $post->id])}}" class="btn btn-primary">SHOW</a>
                    <a href="#" class="btn btn-warning">EDIT</a>
                    <a href="#" class="btn btn-danger">DELETE</a>
                </td>
            </tr>   
            @endforeach
        </tbody>
    </table>

</div>
    
@endsection