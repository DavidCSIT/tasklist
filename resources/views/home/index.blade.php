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
                </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection
