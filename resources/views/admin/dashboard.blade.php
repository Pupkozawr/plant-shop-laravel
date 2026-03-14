@extends('layouts.app')
@section('content')
<h1>Административная панель</h1><div class="grid"><a class="card" href="{{ route('admin.users.index') }}"><h3>Пользователи</h3><p>Создание, редактирование и удаление пользователей</p></a><a class="card" href="{{ route('admin.categories.index') }}"><h3>Категории</h3><p>Управление категориями товаров</p></a><a class="card" href="{{ route('admin.products.index') }}"><h3>Товары</h3><p>Каталог растений и их карточки</p></a><a class="card" href="{{ route('admin.orders.index') }}"><h3>Заказы и сообщения</h3><p>Все заказы и обращения пользователей</p></a></div>
@endsection
