@extends('layouts.app2')

@section('content')

<div class="container-fluid">
<h1>Movie List</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Opening Date</td>
            <td>Image</td>
        </tr>
    </thead>
    <tbody>
    @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->name }}</td>
            <td>{{ $movie->opening_date }}</td>
            <td>
              <img class="img-thumbnail" src="{{$movie->file_path}}" alt="image coming soon">
            </td>
    @endforeach
    </tbody>
</table>
</div>
@endsection
