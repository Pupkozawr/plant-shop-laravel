@extends('layouts.app')
@section('content')
<h1>Мои заказы</h1>@forelse($orders as $order)<div class="card" style="margin-bottom:20px"><h3>Заказ {{ $order->order_number }}</h3><p>Дата: {{ $order->ordered_at?->format('d.m.Y H:i') }} | Статус: {{ $order->status }} | Сумма: {{ $order->total_amount }} ₽</p><table><tr><th>Товар</th><th>Количество</th><th>Цена</th></tr>@foreach($order->items as $item)<tr><td>{{ $item->product->name }}</td><td>{{ $item->quantity }}</td><td>{{ $item->price }} ₽</td></tr>@endforeach</table></div>@empty<p>У вас пока нет заказов.</p>@endforelse
@endsection
