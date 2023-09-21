<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeatSelectionController extends Controller
{
    public function show()
    {
        return view('seat_selection'); // Передаем имя Blade-шаблона
    }
}
