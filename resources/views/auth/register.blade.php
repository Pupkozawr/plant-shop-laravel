@extends('layouts.app')
@section('content')
<div class="card" style="max-width:520px;margin:auto"><h1>Регистрация</h1><form method="POST" action="{{ route('register') }}">@csrf<label>ФИО<input type="text" name="name" value="{{ old('name') }}"></label><label>Email<input type="email" name="email" value="{{ old('email') }}"></label><label>Пароль<input type="password" name="password"></label><label>Подтверждение пароля<input type="password" name="password_confirmation"></label><button class="btn">Создать аккаунт</button></form></div>
@endsection
