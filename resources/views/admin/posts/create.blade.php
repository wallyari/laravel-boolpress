@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <h3 class="mb-4">Add Post</h3>
        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                <option {{(old('category_id')=="")?'selected':''}} value="">Category Null</option>  
                @foreach ($categories as $category)
                <option {{(old('category_id')==$category->id)?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>                
                @endforeach
            </select>            
            @error('category_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        
        <div class="form-group mb-3">
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
                @error('content')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-check form-check-inline" >
                <div class="mb-3 uppercase">Tag:</div>
                @foreach ( $tags as $tag )
                    <div class="form-group form-check">
                        <input {{(in_array($tag->id, old('tags',[])))?'checked':''}} 
                        name="tags[]" 
                        type="checkbox" 
                        class="form-check-input" 
                        id="tag_{{$tag->id}}" 
                        value="{{$tag->id}}">
                        <label class="form-check-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
                    </div>
                @endforeach
                @error('tags')
                    <div class= "alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>    
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
    </form>
</div>
    
@endsection