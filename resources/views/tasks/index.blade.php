@extends('layouts.app2')

@section('content')

<div class="container-fluid">
<h1>Task List</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Due</td>
            <td>Priority</td>
        </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->due_at }}</td>
            <td>{{ $task->priority }}</td>
            <td>
                <form action="tasks/{{$task->id}}" method="POST">
                  @method('DELETE')

                  <a class="mt-1 mx-auto btn btn-small btn-success" href="tasks/{{$task->id}}">Show this task</a>

                  @auth
                  @csrf
                  <a class="mt-1 mx-auto btn btn-small btn-info" href="tasks/{{$task->id}}/edit">Edit this task</a>

                  @endauth
                  
                  @can('is-admin')
                  @csrf
                  <button type="submit" title="delete" class="mt-1 mx-auto btn btn-small btn-danger" >Delete this task</button>
                  @endcan

                </form>
              </td>

        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
