@extends('layouts.app')
@section('content')
<div class="container m-5">
<div class="card">
    <div class="card-header">
       <h3>Title: {{$post->title}}</h3>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <p> Descripion: {{$post->content}}</p>
        <footer class="blockquote-footer ">Slug <cite title="Source Title"> {{$post->slug}}</cite></footer>
        </blockquote>
    </div>
    </div>
    <div class= "card-footer m-3 d-flex justify-content-center">
        <a href="{{route('admin.posts.index')}}" class="btn btn-danger">Back</a>
    </div>


</div>


    
@endsection