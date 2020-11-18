<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Auth;
use DB;


class HomeController extends Controller
{
  public function index()
  {
      $tasks = DB::table('tasks')->orderBy('due_at' ,'desc')->take(5)->get();
      return view('home.index', ['tasks'=>$tasks]);
  }
}
