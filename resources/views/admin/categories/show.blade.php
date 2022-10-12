@extends('layouts.app')
@section('content')
<div class="container text-center">
<div class="card">
    <div class="card-header">
        <h3>{{$category->name}}</h3>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <footer class="blockquote-footer ">Slug: <cite title="Source Title"> {{$category->slug}}</cite></footer>
        </blockquote>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($category->posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                            {{-- <td>                    
                            <a href="{{route('admin.posts.show',['post'=>$post->id])}}" class="btn btn-primary mr-3">SHOW</a>
                            <a href="{{route('admin.posts.edit',['post'=>$post->id])}}" class="btn btn-warning mr-3">EDIT</a>
                            <form method="POST" class="d-sm-inline" action="{{route('admin.posts.destroy',['post'=> $post->id])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mr-3">DELETE</button>
                            </form>
                            </td> --}}
                    </tr>               
                    @endforeach
                </tbody>  
        </table>
    </div>
    </div>
    <div class= "card-footer m-3 d-flex justify-content-center">
        <a href="{{route('admin.categories.index')}}" class="btn btn-danger">Back</a>
    </div>
</div>   
@endsection



