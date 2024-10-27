<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\FavoriteMovie;


class FavoriteMovieController extends Controller
{
    public function store(Request $request)
    {
        $movie = FavoriteMovie::create([
            'user_id' => auth()->id(),
            'movie_id' => $request->movie_id,
            'title' => $request->title,
            'poster' => $request->poster,
        ]);

        session()->flash('success_tambah_data', 'Data berhasil disimpan!');
        return redirect('main1')->with([
            'user' => Auth::user(),
        ]);
    }

    public function index()
    {
        $favorites = FavoriteMovie::where('user_id', auth()->id())->get();
        return view('movies.favorites', compact('favorites'));
    }

    public function destroy($id)
    {
        FavoriteMovie::where('id', $id)->delete();
        session()->flash('success_delete_data', 'Data berhasil disimpan!');
        return redirect('favorites')->with([
            'user' => Auth::user(),
        ]);
    }
}
