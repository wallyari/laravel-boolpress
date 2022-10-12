@extends('layouts.app')

@section('content')
<div class="container">
    <div class="m-3 d-flex justify-content-end">
        {{-- <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Add New Post</a>   --}}
    </div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>                    
                    <a href="{{route('admin.categories.show',['category'=>$category->id])}}" class="btn btn-primary mr-3">SHOW</a>
                    {{-- <a href="{{route('admin.categories.edit',['category'=>$post->id])}}" class="btn btn-warning mr-3">EDIT</a> --}}
                    {{-- <form method="POST" class="d-sm-inline" action="{{route('admin.categories.destroy',['post'=> $post->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mr-3">DELETE</button>
                    </form> --}}
                </td>
            </tr>   
            @endforeach
        </tbody>  
    </table>

</div>
    
@endsection