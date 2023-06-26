@extends('layouts.app')

@section('mario')
<h1>USER | USER</h1>

@foreach($progetti as $elem)
<h2></h2>
<div class="card" style="width: 18rem;">
<img src="{{ asset('storage/' . $elem->img)}}" class="card-img-top" alt="xcane"> 
  <div class="card-body">
    <h5 class="card-title">{{$elem->title}}</h5>
    <p class="card-text">{{$elem->description}}</</p>
    <a href="user/{{$elem->id}}" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
@endforeach
@endsection