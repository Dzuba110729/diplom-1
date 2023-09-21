<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class TicketController extends Controller
{
    public function selectSeats(Request $request)
    {
        // Здесь вы можете получить данные о выбранном фильме и сеансе из запроса
        $movieId = $request->input('movie');
        $sessionId = $request->input('session');

        // Дополнительная логика для обработки выбора билетов

        // Перенаправление на страницу выбора места в кинозале
        return redirect()->route('select-seats', ['movieId' => $movieId, 'sessionId' => $sessionId]);
    }

    public function selectSeatsView($movieId, $sessionId)
    {
        // Здесь вы можете загрузить данные о выбранном сеансе и фильме на основе переданных параметров
        $movie = Movie::find($movieId);
        $session = Session::find($sessionId);

        // Загрузка данных о доступных и занятых местах для данного сеанса
        $availableSeats = Seat::where('session_id', $sessionId)->where('status', 'available')->get();
        $occupiedSeats = Seat::where('session_id', $sessionId)->where('status', 'occupied')->get();

        return view('select-seats', compact('movie', 'session', 'availableSeats', 'occupiedSeats'));
    }

    public function checkout(Request $request)
    {
        // Здесь вы можете получить данные о выбранном месте и количестве билетов из запроса
        $seatId = $request->input('seat');
        $quantity = $request->input('quantity');

        // Дополнительная логика для расчета стоимости и обработки платежа

        // Перенаправление на страницу оплаты
        return redirect()->route('payment');
    }

    public function payment()
    {
        // Здесь вы можете добавить логику для оплаты билетов

        return view('payment');
    }

    public function processPayment(Request $request)
    {
        // Инициализация Stripe с использованием секретного ключа
        Stripe::setApiKey(config('services.stripe.secret'));

        // Получение данных о выбранном месте и количестве билетов из запроса
        $seatId = $request->input('seat');
        $quantity = $request->input('quantity');

        // Дополнительная логика для расчета общей стоимости заказа
        $totalAmount = $quantity * $seatPrice; // Замените на вашу логику

        try {
            // Создание платежа с использованием Stripe PaymentIntent API
            $paymentIntent = PaymentIntent::create([
                'amount' => $totalAmount,
                'currency' => 'usd', // Замените на вашу валюту
            ]);

            // Возвращаем клиенту клиентский секрет PaymentIntent
            return view('payment.process', [
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (Exception $e) {
            // Обработка ошибок оплаты
            return redirect()->route('select-seats')->with('error', 'Произошла ошибка при обработке оплаты.');
        }
    }

    public function ticketConfirmation()
    {
        // Дополнительная логика для отображения подтверждения заказа
        return view('ticket.confirmation');
    }

    public function checkout()
    {
        // Здесь вы можете получить информацию о выбранных местах, фильме и сеансе
        // и передать ее в представление для отображения на странице бронирования.
        $selectedSeats = []; // Получите информацию о выбранных местах
        $movieInfo = []; // Получите информацию о фильме
        $sessionInfo = []; // Получите информацию о сеансе

        return view('checkout', compact('selectedSeats', 'movieInfo', 'sessionInfo'));
    }

    public function showTickets($orderNumber)
    {
        // Здесь вы должны получить информацию о билетах на основе номера заказа
        $orderInfo = []; // Получите информацию о заказе из базы данных

        // Верните представление с информацией о билетах
        return view('tickets', compact('orderInfo'));
    }

    public function show(Booking $booking)
    {
        return view('tickets', compact('booking'));
    }
}
