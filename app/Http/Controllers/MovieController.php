<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search', '');
        
        if ($query) {
            $response = Http::get('http://www.omdbapi.com/', [
                'apikey' => config('omdb.apikey'),
                's' => $query,
            ]);
        } else {
            $response = Http::get('http://www.omdbapi.com/', [
                'apikey' => config('omdb.apikey'),
                's' => '2023', 
                'y' => '2023',  
                'page' => $request->get('page', 1),
            ]);
        }

        $movies = $response->json()['Search'] ?? [];

        if ($request->ajax()) {
            return response()->json($movies);
        }

        return view('layout.main1',compact('movies'))->with([
            'user' => Auth::user(),
         ]);
    }

    public function show($id)
    {
        $response = Http::get('http://www.omdbapi.com/', [
            'apikey' => config('omdb.apikey'),
            'i' => $id,
        ]);

        $movie = $response->json();
        return view('layout.detailmovie', compact('movie'));
    }
}
