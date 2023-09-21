<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function showSchedule()
    {
        // Здесь вы можете получить данные о расписании из базы данных
        // Пример:
        $schedule = Schedule::all(); // Предполагается, что у вас есть модель Schedule

        return view('schedule', compact('schedule'));
    }

    public function showMovies()
    {
        // Здесь вы можете получить данные о фильмах из базы данных
        // Пример:
        $movies = Movie::all(); // Предполагается, что у вас есть модель Movie

        return view('movies', compact('movies'));
    }
}
