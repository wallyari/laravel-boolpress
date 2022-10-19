@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{route('admin.posts.deleteCover',['post'=>$post])}}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
        <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="POST"  id="deleteCoverForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <h3 class="mb-4">Edit Post</h3>
        
        <div class="form-group mb-3">
            <h5>Current image:</h5>
                @if ($post->cover)
                    <img src="{{asset('storage/' . $post->cover)}}" class="img-fluid"/>
                    <a href="#" class="btn btn-danger mb-3 mt-3" onclick="event.preventDefault(); document.getElementById('deleteCoverForm').submit();">Delete immagine</a>
                @else
                    <h5 class="p-3 mb-2 bg-danger text-white text-center">NO IMG</h5>
                @endif


            <label for="cover">IMG COVER</label> 
            <input class="form-control-file @error('image') is-invalid @enderror" type="file" name="image" id="cover">
            @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>  

        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                <option {{(old('category_id',$post->category_id)=="")?'selected':''}} value="">Category Null</option>  
                @foreach ($categories as $category)
                <option {{(old('category_id', $post->category_id)==$category->id)?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>                
                @endforeach
            </select>            
            @error('category_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" required placeholder="Enter title" name="title" value="{{old('title', $post->title)}}" max="255" >
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            </div>
            @enderror
        
            <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" required placeholder="Enter Content" name="content">{{old('content', $post->title)}}
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
                    @if ($errors->any())
                        <input {{(in_array($tag->id, old('tags',[])))?'checked':''}} name="tags[]" type="checkbox" class="form-check-input" id="tag_{{$tag->id}}" value="{{$tag->id}}">
                    @else
                        <input {{($post->tags->contains($tag))?'checked':''}} name="tags[]" type="checkbox" class="form-check-input" id="tag_{{$tag->id}}" value="{{$tag->id}}">
                    @endif
                    <label class="form-check-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
                </div>
            @endforeach
            @error('tags')
                <div class="alert alert-danger">
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