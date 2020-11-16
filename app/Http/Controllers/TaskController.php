<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function duethismonth()
     {
         $task = task::whereMonth('due_at',date('m'))->get();
         return view('tasks.duethismonth', ['tasks'=>$task]);
     }

    public function index()
    {
        $task = task::all();
        return view('tasks.index', ['tasks'=>$task]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      request()->validate([
        'name'=> 'required',
        'description'=> 'required',
        'due_at'=> 'required',
        'priority'=> 'required'
      ]);

      $task = new Task();
          // dd($request);
      $fileName = time().'_'.$request->file->getClientOriginalName();
      $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

      $task->file_name = time().'_'.$request->file->getClientOriginalName();
      $task->file_path = '/storage/' . $filePath;

      $task->name = request('name');
      $task->description =  request('description');
      $task->due_at =  request('due_at');
      $task->priority =  request('priority');

      $task->file_name =  time().'_'.$request->file->getClientOriginalName();;
      $task->file_path =  $request->file('file')->storeAs('uploads', $fileName, 'public');

      $task->user_id =  Auth::user()->id;
      $task->save();

      return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
      return view('tasks.show', ['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
      request()->validate([
        'name'=> 'required',
        'description'=> 'required',
        'due_at'=> 'required',
        'priority'=> 'required'
        // 'file' => 'required|mimes:jpg|max:2048'
      ]);

      $fileName = time().'_'.$request->file->getClientOriginalName();
      // dd($fileName);

      $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

      $task->file_name = time().'_'.$request->file->getClientOriginalName();
      $task->file_path = '/storage/' . $filePath;

      $task->name = request('name');
      $task->description =  request('description');
      $task->due_at =  request('due_at');
      $task->priority =  request('priority');

      $task->file_name =  time().'_'.$request->file->getClientOriginalName();;
      $task->file_path =  $request->file('file')->storeAs('uploads', $fileName, 'public');

      $task->user_id =  Auth::user()->id;
      $task->save();

      return redirect('tasks');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
      $task->delete();
      return redirect('tasks');
    }
}
