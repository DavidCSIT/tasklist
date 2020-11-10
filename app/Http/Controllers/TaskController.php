<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

      //$request->image->storeAs('/public', a.jpg);

      // Storage::url(a.jpg);
      //           $file = File::create([
      //              'name' => $validated['name'],
      //               'url' => $url,
      //           ]);
      //           Session::flash('success', "Success!");
      //           return \Redirect::back();
      //       }
      //   }
      //   abort(500, 'Could not upload image :(');


      // Storage::url($validated['name'].".".$extension);
      //           $file = File::create([
      //              'name' => $validated['name'],
      //               'url' => $url,
      //           ]);
      //           Session::flash('success', "Success!");
      //           return \Redirect::back();
      //       }
      //   }
      //   abort(500, 'Could not upload image :(');


      //$request->image->storeAs('/public', $validated['name'].".".$extension)

      return redirect('/tasks');
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

      $fileModel = new File;

      if($request->file()) {
          $fileName = $request->file->getClientOriginalName();
          $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

          $fileModel->name = time().'_'.$request->file->getClientOriginalName();
          $fileModel->file_path = '/storage/' . $filePath;
          $fileModel->save();
          }

      $task->update($request->all());

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
