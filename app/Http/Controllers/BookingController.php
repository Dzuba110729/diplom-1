<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function selectSeat($session_id)
    {
        // Здесь вы можете получить информацию о сеансе, местах и фильме
        $session = Session::find($session_id);
        $seats = Seat::where('session_id', $session_id)->get();
        $movie = $session->movie;

        // Передайте эту информацию на страницу выбора места и бронирования билета
        return view('booking.select-seat', compact('session', 'seats', 'movie'));
    }
}
