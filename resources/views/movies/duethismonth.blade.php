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
          @auth
            <td>
              <form action="tasks/{{$task->id}}" method="POST">
                @method('DELETE')
                @csrf

                <a class="mt-1 mx-auto btn btn-small btn-success" href="tasks/{{$task->id}}">Show this task</a>

                @canany(['update-task', 'is-admin' ],$task)
                 <a class="mt-1 mx-auto btn btn-small btn-info" href="tasks/{{$task->id}}/edit">Edit this task</a>
                @endcanany

                @can('is-admin')
                    <button type="submit" title="delete" class="mt-1 mx-auto btn btn-small btn-danger" >Delete this task</button>
                @endcan
            </form>
           </td>
          @endauth
        </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
