@extends('layouts.app2')

@section('content')

<div class="container">
<h1>New Task</h1>

<form method="POST" action="/tasks" enctype="multipart/form-data">
  @csrf

  <div class="field">
    <label for="name">Name</label>
    <div class="control">
      <input class="form-control input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name" value="{{ @old('name') }}" id="name" placeholder="Recipe name">
    </div>
  </div>

  <div class="field">
    <label for="description">Description</label>
    <div class="control">
      <input class="form-control input {{ $errors->has('description') ? 'is-danger' : '' }}" type="text" name="description" value="{{ @old('description') }}" id="description">
    </div>
  </div>


    <div class="field">
      <label for="due_at">Due</label>
      <div class="control">
        <input class="form-control input {{ $errors->has('due_at') ? 'is-danger' : '' }}" type="text" name="due_at" value="{{ @old('due_at') }}" id="due_at">
      </div>
    </div>

    <div class="field">
      <label for="file">Image</label>
         <div class="control">
          <input id="file" type="file" class="form-control input {{ $errors->has('image_path') ? 'is-danger' : '' }}" name="file">
       </div>
    </div>

    <div class="row">
      <div class="field form-group col">
        <label for="serves">Priority</label>
        <div class="control">
          <select class="form-control input" id="priority" name="priority" value="{{ @old('priority') }}" >
            <option >1</option>
            <option >2</option>
            <option >3</option>
            <option >4</option>
            <option >5</option>
            <option >6</option>
          </select>
        </div>
      </div>
    </div>



     <div class="field is-grouped">
       <div class="control">
         <button class="button is-link btn btn-primary" type="submit" name="button">Submit Recipe</button>
       </div>
     </div>
   </form>
</div>
@endsection
