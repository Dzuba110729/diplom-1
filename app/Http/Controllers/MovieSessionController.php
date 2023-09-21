<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MovieSessionController extends Controller
{
    public function index()
    {
        // Здесь вы можете получить список доступных фильмов и расписание сеансов из базы данных
        $movies = Movie::all();
        $sessions = Session::all();

        return view('select-movie-session', compact('movies', 'sessions'));
    }
}
