
@extends('layouts.app')

@section('title', 'Create Tags')


@section('content')
<div class="container">
    <form action="{{route('admin.tags.update', ['tag' => $tag->id])}}" method="POST">
        @csrf
        @method('PUT')
        
        <h3 class="mb-4">Edit Tags</h3>
        <label for="name">Tag</label>
        <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" value="{{old('name', $tag->name)}}">       
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror 
        <div class="mt-3">  
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="{{route('admin.tags.index')}}" class="btn btn-danger">Back</a>
        </div>
    </form>
</div>


@endsection