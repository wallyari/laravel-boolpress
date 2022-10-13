@extends('layouts.app')

@section('content')
<div class="container">
    <div class="m-3 d-flex justify-content-end">
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
                    
                </td>
            </tr>   
            @endforeach
        </tbody>  
    </table>

</div>
    
@endsection