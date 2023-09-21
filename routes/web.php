<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/select-movie-session', 'MovieSessionController@index')->name('select-movie-session');
Route::post('/book-ticket', 'TicketController@selectSeats')->name('book-ticket');
Route::get('/select-seats/{movieId}/{sessionId}', 'TicketController@selectSeatsView')->name('select-seats');
Route::post('/checkout', 'TicketController@checkout')->name('checkout');
Route::get('/payment', 'TicketController@payment')->name('payment');
Route::post('/payment/process', 'TicketController@processPayment')->name('process-payment');
Route::get('/ticket-confirmation', 'TicketController@ticketConfirmation')->name('ticket-confirmation');
Route::get('/seat-selection', 'SeatSelectionController@show');
Route::get('/select-seats', 'TicketController@selectSeats')->name('select-seats');
Route::get('/checkout', 'TicketController@checkout')->name('checkout');
Route::post('/process-payment', 'PaymentController@processPayment')->name('process-payment');
Route::get('/tickets/{orderNumber}', 'TicketController@showTickets')->name('show-tickets');
Route::get('/schedule', 'GuestController@showSchedule')->name('schedule');
Route::get('/movies', 'GuestController@showMovies')->name('movies');
Route::get('/select-seat/{session_id}', 'BookingController@selectSeat')->name('select.seat');
Route::get('/tickets/{booking}', 'TicketController@show')->name('tickets.show');







require __DIR__.'/auth.php';
