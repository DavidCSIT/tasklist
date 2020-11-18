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
          @auth
            <td>
              <form action="movies/{{$movie->id}}" method="POST">
                @method('DELETE')
                @csrf

                <a class="mt-1 mx-auto btn btn-small btn-success" href="movies/{{$movie->id}}">Show this movie</a>

                <a class="mt-1 mx-auto btn btn-small btn-info" href="movies/{{$movie->id}}/edit">Edit this movie</a>

                <button type="submit" title="delete" class="mt-1 mx-auto btn btn-small btn-danger" >Delete this movie</button>
          @endauth
            </form>
           </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
