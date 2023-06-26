@extends('layouts.app')

@section('mario')
<h1>USER | SHOW</h1>

<h2></h2>

<div class="card" style="width: 18rem;">
  <img src="{{ asset('storage/' . $proge->img)}}" class="card-img-top" alt="xcane">
  <div class="card-body">
    <h5 class="card-title">{{$progetti->title}}</h5>
    <p class="card-text">{{$progetti->description}}</p>

  </div>
</div>
@endsection