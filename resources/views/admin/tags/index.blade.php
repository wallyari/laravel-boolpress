@extends('layouts.app')

@section('content')
<div class="container">
    <div class="m-3 d-flex justify-content-start">
        <a href="{{route('admin.tags.create')}}" class="btn btn-success">Add Tags</a> 
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
            @foreach ($tags as $tag)
            <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->name}}</td>
                <td>{{$tag->slug}}</td>
                <td>                    
                    <a href="{{route('admin.tags.show',['tag'=>$tag->id])}}" class="btn btn-primary mr-3">SHOW</a>
                    <a href="{{route('admin.tags.edit', ['tag' => $tag->id])}}" class="btn btn-warning mr-3">EDIT</a>
                    <form action="{{route('admin.tags.destroy', ['tag' => $tag->id])}}" method="POST" class="d-sm-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
            </tr>   
            @endforeach
        </tbody>  
    </table>

</div>
    
@endsection