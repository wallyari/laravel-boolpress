@extends('layouts.app')
@section('content')

    <div class="container">
        <form action="{{route('admin.categories.update', ['category' => $category->id])}}" method="POST">
            @csrf
            @method('PUT')            
            <label for="name" class="form-label">Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="Edit Category" name="name" 
                value="{{old('name', $category->name)}}">
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>           
            <button type="submit" class="btn btn-primary">Save Edit</button>
            <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Back</a>
        </form>        
    </div> 
@endsection