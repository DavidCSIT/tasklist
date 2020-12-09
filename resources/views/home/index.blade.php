@extends('layouts.app2')

@section('content')

<div class="container-fluid">
<h1 class="text-center my-4">Coming Soon!</h1>

  <div class="row">
    @foreach($movies as $movie)
    <div class="col">
      <img src="{{$movie->file_path}}" class="img-fluid" alt="image coming soon">

      <table class="table table-striped table-bordered text-center">
        <tr>
          <td>Move</td>
          <td>Opening Date</td>
          <td>Genre</td>
        </tr>
        <tr>
          <td>{{ $movie->name }}</td>
          <td>{{ $movie->opening_date }}</td>
          <td>{{ $movie->description}}</td>
        </tr>
      </table>
    </div>
    @endforeach
  </div>
</div>
@endsection
