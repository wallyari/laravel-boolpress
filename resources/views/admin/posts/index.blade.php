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
            <th scope="col">Cover Thamb</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <th scope="row">
                    @if($post->cover)
                        <img src="{{asset('storage/'. $post->cover)}}" class="img-fluid" style="width:70px;"/>
                    @else
                        <img src="{{asset('img/placeholder.png')}}" class="img-fluid" style="width:70px;"/>
                    @endif
                </th>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{($post->category)?$post->category->name: '_'}}</td>
                
                <td>
                    @foreach ($post->tags as $tag)
                    {{$tag->name}}
                        
                    @endforeach
                </td>
                
                <td>                    
                    <a href="{{route('admin.posts.show',['post'=>$post->id])}}" class="btn btn-primary mr-3">SHOW</a>
                    <a href="{{route('admin.posts.edit',['post'=>$post->id])}}" class="btn btn-warning mr-3">EDIT</a>
                    <form method="POST" class="d-sm-inline" action="{{route('admin.posts.destroy',['post'=> $post->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mr-3">DELETE</button>
                    </form>
                </td>
            </tr>   
            @endforeach
        </tbody>  
    </table>

</div>
    
@endsection