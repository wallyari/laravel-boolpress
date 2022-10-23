@extends('layouts.app')

@section('content')

<div class='container d-flex justify-content-center'>
    <div class="row text-center">
        <h1 class="col-12">Benvenuto nell'area amministrativa</h1>
        <h1 class="col-12 text-danger">{{Auth::user()->name}}</h1>
    </div>
    
</div>
    
@endsection