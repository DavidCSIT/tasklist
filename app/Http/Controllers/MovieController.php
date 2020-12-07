<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Auth;
use DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all movies
        $movies = movie::all();
        return view('movies.index', ['movies'=>$movies]);
    }

    public function comingsoon()
    {
        $movies = DB::table('movies')->orderBy('opening_date' ,'desc')->take(4)->get();
        return view('home.index', ['movies'=>$movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //load new movie form
        $genres = DB::table('genres')->orderBy('description')->get();
        return view('movies.create',['genres'=>$genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save a new movie
        request()->validate([
          'name'=> 'required',
          'opening_date'=> 'required'
        ]);

        $movie = new Movie();

        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        $movie->file_name = $fileName;
        $movie->file_path = '/storage/' . $filePath;

        $movie->name = request('name');
        $movie->opening_date =  request('opening_date');
        $movie->status =  "C";
        $movie->genre_id =  request('genre_id');

        $movie->save();

        return redirect('movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //show one movie
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //load my change movie form
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //save my changes
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //delete my movie
        $movie->delete();
        return redirect('movies');
    }
}
