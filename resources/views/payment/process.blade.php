@extends('layouts.app')

@section('content')
    <h1>Обработка оплаты</h1>
    
    <div id="payment-form">
        <!-- Здесь добавьте форму для оплаты, используя Stripe.js и элементы Stripe -->
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ config('services.stripe.key') }}');
        var elements = stripe.elements();
        var clientSecret = '{{ $clientSecret }}';

        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        var card = elements.create('card', { style: style });
        card.mount('#payment-form');

        card.on('change', function(event) {
            // Отображение ошибки, если есть ошибка
            if (event.error) {
                document.getElementById('card-errors').textContent = event.error.message;
            } else {
                document.getElementById('card-errors').textContent = '';
            }
        });

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                }
            }).then(function(result) {
                if (result.error) {
                    // Ошибка оплаты
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Оплата прошла успешно, выполните дополнительные действия
                    // Например, сохраните информацию о заказе в базе данных

                    window.location.href = '{{ route('ticket-confirmation') }}';
                }
            });
        });
    </script>
@endsection
