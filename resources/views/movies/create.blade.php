@extends('layouts.app2')

@section('content')

<div class="container">
<h1>New movie</h1>

<form method="POST" action="/movies" enctype="multipart/form-data">
  @csrf

  <div class="field">
    <label for="name">Name</label>
    <div class="control">
      <input class="form-control input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name" value="{{ @old('name') }}" id="name" placeholder="Movie name">
    </div>
  </div>


    <div class="field">
      <label for="opening_date">Opening Date</label>
      <div class="control">
        <input class="form-control input {{ $errors->has('opening_date') ? 'is-danger' : '' }}" type="text" name="opening_date" value="{{ @old('opening_date') }}" id="opening_date">
      </div>
    </div>

    <div class="field">
      <label for="file">Image</label>
         <div class="control">
          <input id="file" type="file" class="form-control input {{ $errors->has('image_path') ? 'is-danger' : '' }}" name="file">
       </div>
    </div>
    <br>

    <div class="row">
      <div class="field form-group col">
        <label for="genre_id">genre</label>
        <div class="control">
          <select class="form-control input" id="genre_id" name="genre_id" >

            @foreach($genres as $genre)
              <option  value={{ $genre->id }} >{{ $genre->description }}</option>
            @endforeach

          </select>
        </div>
      </div>
    </div>

     <div class="field is-grouped">
       <div class="control">
         <button class="button is-link btn btn-primary" type="submit" name="button">Submit Movie</button>
       </div>
     </div>
   </form>
   <br>
</div>

<br>
@endsection
