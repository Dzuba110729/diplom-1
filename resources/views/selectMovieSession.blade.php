<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

<div class="calendar">
    <h2>Выберите сеанс:</h2>
    <div class="calendar-header">
        <!-- Здесь может быть заголовок календаря, например, название месяца и года -->
    </div>
    <table class="calendar-table">
        <thead>
            <tr>
                <th>Пн</th>
                <th>Вт</th>
                <th>Ср</th>
                <th>Чт</th>
                <th>Пт</th>
                <th>Сб</th>
                <th>Вс</th>
            </tr>
        </thead>
        <tbody>
            <!-- Здесь будет генерироваться календарь сеансов -->
        </tbody>
    </table>
	 <button id="choose-session-button">Выбрать сеанс</button>
</div>

<script src="{{ asset('js/calendar.js') }}"></script>
