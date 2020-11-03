@extends('layouts.app2')

@section('content')

<div class="container-fluid">
<h1>Edit Recipe</h1>

<form method="POST" action="/tasks/{{$task->id}} ">
  @method('PUT')
  @csrf

  <div class="field">
    <label for="name">Name</label>
    <div class="control">
      <input class="form-control input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" name="name" value="{{$task->name}}" id="name">
    </div>
  </div>

  <div class="field">
    <label for="description">Description</label>
    <div class="control">
      <input class="form-control input {{ $errors->has('description') ? 'is-danger' : '' }}" type="text" name="description" value="{{$task->description}}" id="description">
    </div>
  </div>

  <div class="field">
    <label for="due_at">Description</label>
    <div class="control">
      <input class="form-control input {{ $errors->has('due_at') ? 'is-danger' : '' }}" type="text" name="due_at" value="{{$task->due_at}}" id="due_at">
    </div>
  </div>

  <div class="row">
    <div class="field form-group col">
      <label for="serves">Priority</label>
      <div class="control">
        <select class="form-control input" id="priority" name="priority" >
          <option {{ $task->priority == 1 ? 'selected' : '' }}>1</option>
          <option {{ $task->priority == 2 ? 'selected' : '' }}>2</option>
          <option {{ $task->priority == 3 ? 'selected' : '' }}>3</option>
          <option {{ $task->priority == 4 ? 'selected' : '' }}>4</option>
          <option {{ $task->priority == 5 ? 'selected' : '' }}>5</option>
          <option {{ $task->priority == 6 ? 'selected' : '' }} >6</option>
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