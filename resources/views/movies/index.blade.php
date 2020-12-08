@extends('layouts.app2')

@section('content')

<div class="container">
<h1>Movie List</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Opening Date</td>
            <td>Image</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($movies as $movie)
        <tr>
            <td>{{ $movie->id }}</td>
            <td>{{ $movie->name }}</td>
            <td>{{ $movie->opening_date }}</td>
            <td>
              <img class="img-thumbnail" src="{{$movie->file_path}}" alt="image coming soon" style="height:10%" >
            </td>
          @auth
            <td>
              <form action="movies/{{$movie->id}}" method="POST">
                @method('DELETE')
                @csrf

                <a class="mt-1 mx-auto btn btn-small btn-success" href="movies/{{$movie->id}}">Show this movie</a>
                <br>
                <a class="mt-1 mx-auto btn btn-small btn-info" href="movies/{{$movie->id}}/edit">Edit this movie</a>
                <br>
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
