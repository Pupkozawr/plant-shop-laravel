@extends('layouts.app')
@section('content')
<div class="card"><h1>Подтверждение заказа</h1><table><tr><th>Товар</th><th>Кол-во</th><th>Сумма</th></tr>@foreach($items as $item)<tr><td>{{ $item['product']->name }}</td><td>{{ $item['quantity'] }}</td><td>{{ number_format($item['subtotal'], 2, ',', ' ') }} ₽</td></tr>@endforeach</table><p><strong>Итого: {{ number_format($total, 2, ',', ' ') }} ₽</strong></p><form method="POST" action="{{ route('orders.store') }}">@csrf <button class="btn">Подтвердить заказ</button></form></div>
@endsection
