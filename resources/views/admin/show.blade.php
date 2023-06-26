@extends('layouts.app')

@section('mario')
<h1>ADMIN | SHOW</h1>

<h2></h2>

<div class="card" style="width: 18rem;">
<img src="{{ asset('storage/' . $proge->img)}}" class="card-img-top" alt="xcane">
  <div class="card-body">
    <h5 class="card-title">{{$proge->title}}</h5>
    <p class="card-text">{{$proge->description}}</p>
    @if( $proge->lenguages )
        @foreach ( $proge->lenguages as $elem )
          <div> {{ $elem->name }} </div>
        @endforeach
    @endif

  </div>
</div>
@endsection