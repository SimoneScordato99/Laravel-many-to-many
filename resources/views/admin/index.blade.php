@extends('layouts.app')

@section('mario')
<h1>ADMIN | INDEX</h1>

<div class="d-flex flex-wrap">
  @foreach($proge as $elem)
  <h2></h2>
  <div class="card" style="width: 18rem;">
    <img src="{{ asset('storage/' . $elem->img)}}" class="card-img-top" alt="xcane"> 
    <div class="card-body">
      <h5 class="card-title">{{$elem->title}}</h5>
      <p class="card-text">{{$elem->description}}</</p>
      <a href="admin/{{$elem->id}}" class="btn btn-primary">show</a>
      <a href="admin/{{$elem->id}}/edit" class="btn btn-secondary">modifica</a>
      <form action="{{route('admin.destroy', $elem)}}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-delete">elimina</button>
      </form>
    </div>
  </div>
  @endforeach
</div>
@endsection