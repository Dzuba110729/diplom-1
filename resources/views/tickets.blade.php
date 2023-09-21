<!DOCTYPE html>
<html>
<head>
    <title>Информация о билетах</title>
</head>
<body>
    <h1>Информация о бронировании:</h1>
    <!-- Отображение информации о билетах (номер заказа, фильм, сеанс, места, цена) -->

    <h2>Билеты:</h2>
    <!-- Здесь вы можете отобразить билеты в удобном формате -->
    <!-- Например, в виде списка билетов с QR-кодами -->

    <button id="printButton">Печать билетов</button>

    <!-- JavaScript для обработки нажатия кнопки печати -->
    <script>
        document.getElementById("printButton").addEventListener("click", function() {
            // Вызываем функцию window.print() для печати страницы
            window.print();
        });
    </script>
</body>
</html>

