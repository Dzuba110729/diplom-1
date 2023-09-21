const seats = document.querySelectorAll('.seat');
var selectedSeats = [];


seats.forEach(function (seat) {
	seat.addEventListener("click", function () {
		if (seat.classList.contains("available")) {
			// Если место доступно, добавьте его в список выбранных мест
			selectedSeats.push(seat.getAttribute("data-seat"));
			// Измените его состояние
			seat.classList.remove("available");
			seat.classList.add("occupied");
		} else if (seat.classList.contains("occupied")) {
			// Если место занято, удалите его из списка выбранных мест
			var seatIndex = selectedSeats.indexOf(seat.getAttribute("data-seat"));
			if (seatIndex !== -1) {
				selectedSeats.splice(seatIndex, 1);
			}
			// Измените его состояние
			seat.classList.remove("occupied");
			seat.classList.add("available");
		}
	});
});

// Отправка данных на сервер
fetch("/api/reserve-seats", {
	method: "POST",
	headers: {
		"Content-Type": "application/json"
	},
	body: JSON.stringify({ selectedSeats: selectedSeats })
})
	.then(function (response) {
		// Обработка ответа от сервера
		if (response.ok) {
			// Успешно забронировано
			// Вы можете выполнить перенаправление или отобразить сообщение об успешном бронировании
		} else {
			// Ошибка бронирования, обработка ошибки
		}
	})
	.catch(function (error) {
		// Обработка ошибок при отправке запроса
	});
