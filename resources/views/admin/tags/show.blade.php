@extends('layouts.app')
@section('content')
<div class="container text-center">
<div class="card">
    <div class="card-header">
        <h3>{{$tag->name}}</h3>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <footer class="blockquote-footer ">Slug: <cite title="Source Title"> {{$tag->slug}}</cite></footer>
        </blockquote>
        @if(count($tag->posts))
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                </tr>
            </thead>
                <tbody>
                    @foreach ($tag->posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                    </tr>               
                    @endforeach
                </tbody>  
        </table>
    @endif
    </div>
    </div>
    <div class= "card-footer m-3 d-flex justify-content-center">
        <a href="{{route('admin.tags.index')}}" class="btn btn-danger">Back</a>
    </div>
</div>   
@endsection



