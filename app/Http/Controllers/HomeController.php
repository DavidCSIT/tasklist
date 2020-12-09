<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Auth;
use DB;


class HomeController extends Controller
{
  public function index()
  {
      // $movies = DB::table('movies')->where('status', 'C')->orderBy('opening_date' ,'desc')->take(4)->get();
      $movies = DB::table('movies')->where('status', 'C')->orderBy('opening_date' ,'desc')->join('genres','movies.genre_id', '=', 'genres.id'  ) ->take(4)->get();
      dd($movies);
      return view('home.index', ['movies'=>$movies]);
  }

  public function comingsoon()
  {
      $movies = DB::table('movies')->orderBy('opening_date' ,'desc')->take(4)->get();
      return view('home.index', ['movies'=>$movies]);
  }
}
