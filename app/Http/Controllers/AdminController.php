<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hall;
use App\Movie;

class AdminController extends Controller
{
    // Метод для отображения списка залов
    public function showHalls()
    {
        $halls = Hall::all(); // Получаем все залы из базы данных
        return view('admin.halls.index', ['halls' => $halls]);
    }

    // Метод для отображения формы редактирования зала
    public function editHall($id)
    {
        $hall = Hall::findOrFail($id); // Находим зал по идентификатору
        return view('admin.halls.edit', ['hall' => $hall]);
    }

    // Метод для обновления информации о зале
    public function updateHall(Request $request, $id)
    {
        // Валидация данных, например, название зала не должно быть пустым
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Другие правила валидации
        ]);

        // Находим зал по идентификатору
        $hall = Hall::findOrFail($id);

        // Обновляем информацию о зале на основе данных из формы
        $hall->name = $request->input('name');
        // Добавьте другие поля для обновления

        // Сохраняем изменения в базе данных
        $hall->save();

        // Редиректим на страницу с списком залов с сообщением об успешном обновлении
        return redirect('/admin/halls')->with('success', 'Информация о зале обновлена успешно.');
    }

    // Метод для отображения списка фильмов
    public function showMovies()
    {
        $movies = Movie::all();
        return view('admin.movies.index', ['movies' => $movies]);
    }

    // Метод для отображения формы редактирования фильма
    public function editMovie($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.movies.edit', ['movie' => $movie]);
    }

    // Метод для обновления информации о фильме
    public function updateMovie(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
        ]);

        $movie = Movie::findOrFail($id);

        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->release_date = $request->input('release_date');

        $movie->save();

        return redirect('/admin/movies')->with('success', 'Информация о фильме обновлена успешно.');
    }

    // Метод для отображения текущих цен
    public function showPrices()
    {
        $prices = Price::all();
        return view('admin.prices.index', ['prices' => $prices]);
    }

    // Метод для обновления цен
    public function updatePrices(Request $request)
    {
        // Валидация данных, например, цена должна быть числом и положительной
        $validatedData = $request->validate([
            'price.*' => 'required|numeric|min:0',
        ]);

        // Обновляем цены в базе данных на основе данных из формы
        foreach ($validatedData['price'] as $key => $value) {
            $price = Price::where('id', $key)->first();
            if ($price) {
                $price->value = $value;
                $price->save();
            }
        }

        return redirect('/admin/prices')->with('success', 'Цены обновлены успешно.');
    }

    // Метод для отображения расписания сеансов
    public function showSchedule()
    {
        $schedule = Schedule::all();
        return view('admin.schedule.index', ['schedule' => $schedule]);
    }

    // Метод для отображения формы редактирования расписания сеансов
    public function editSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedule.edit', ['schedule' => $schedule]);
    }

    // Метод для обновления расписания сеансов
    public function updateSchedule(Request $request, $id)
    {
        // Валидация данных, например, время начала и окончания сеанса, дата и т.д.
        $validatedData = $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'date' => 'required|date',
            // Другие правила валидации, если необходимо
        ]);

        $schedule = Schedule::findOrFail($id);

        $schedule->start_time = $request->input('start_time');
        $schedule->end_time = $request->input('end_time');
        $schedule->date = $request->input('date');

        $schedule->save();

        return redirect('/admin/schedule')->with('success', 'Расписание обновлено успешно.');
    }
}
