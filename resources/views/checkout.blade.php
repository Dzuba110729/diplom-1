<!DOCTYPE html>
<html>
<head>
    <title>Бронирование билета</title>
</head>
<body>
    <h1>Сводка выбранных мест, фильма и сеанса:</h1>
    <!-- Отображение информации о выбранных местах, фильме и сеансе -->

    <h2>Информация о платеже:</h2>
    <form action="/process-payment" method="POST">
        @csrf
        <!-- Форма для ввода информации о платеже -->
        <label for="credit-card">Номер кредитной карты:</label>
        <input type="text" id="credit-card" name="credit-card" required>

        <!-- Другие поля для информации о платеже (срок действия, CVV и т. д.) -->

        <button type="submit">Оплатить</button>
    </form>
</body>
</html>
