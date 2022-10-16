@extends('layouts.app')
@section('content')

    <div class="container">
        <form action="{{route('admin.tags.store')}}" method="POST">
            @csrf            
            <label for="name" class="form-label">Name</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>           
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('admin.tags.index')}}" class="btn btn-primary">Back</a>
        </form>        
    </div> 
@endsection