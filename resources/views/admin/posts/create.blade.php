@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" required placeholder="Enter title" name="title" value="{{old('title')}}" max="255" >
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            </div>
            @enderror
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" required placeholder="Enter Content" name="content">
                {{old('content')}}
            </textarea>
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

</div>
    
@endsection