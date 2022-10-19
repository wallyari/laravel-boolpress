@extends('layouts.app')
@section('content')
<div class="container text-center">
    
    @if($post->cover)
        <img src="{{asset('storage/' . $post->cover)}}" class="img-fluid"/>
    @else
        <img src="{{asset('img/placeholder.png')}}" class="img-fluid"/>
    @endif
<div class="card">
    <div class="card-header">
        <h3>Title: {{$post->title}}</h3>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <p> Descripion: {{$post->content}}</p>
        <p> Category: {{$post->category?$post->category->name:'Unavailable'}}</p>
        <span class="">Tags:</span>
            @foreach ($post->tags as $tag)
            {{$tag->name}} -            
            @endforeach
    </div>
        <div>
        <footer class="blockquote-footer ">Slug: <cite title="Source Title"> {{$post->slug}}</cite></footer>
        </blockquote>
    </div>
    </div>
    <div class= "card-footer m-3 d-flex justify-content-center">
        <a href="{{route('admin.posts.index')}}" class="btn btn-danger">Back</a>
    </div>
</div>   
@endsection