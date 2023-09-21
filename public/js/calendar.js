// Массив с данными о сеансах (здесь представлен в упрощенном виде)
var sessionsData = [
	{ date: "2023-09-01", time: "15:00" },
	{ date: "2023-09-02", time: "18:30" },
	// Другие сеансы...
];

// Функция для заполнения таблицы расписания
function populateSchedule() {
	var tbody = document.querySelector(".calendar tbody");

	// Очищаем таблицу
	tbody.innerHTML = "";

	// Заполняем таблицу данными о сеансах
	sessionsData.forEach(function(session) {
		 var date = new Date(session.date);
		 var day = date.getDate();
		 var cell = document.createElement("td");
		 cell.textContent = session.time;
		 // Добавляем ячейку в соответствующий день
		 tbody.querySelector("tr:nth-child(" + Math.ceil(day / 7) + ") td:nth-child(" + (day % 7 || 7) + ")").appendChild(cell);
	});
}

// Вызываем функцию для заполнения расписания
populateSchedule();

$(document).ready(function() {
	$('#choose-session-button').on('click', function() {
		 // Здесь вы можете перенаправить пользователя на страницу выбора места
		 // или выполнить другие действия в зависимости от выбранного сеанса и фильма.
		 window.location.href = '/select-seats'; // Пример перенаправления
	});
});