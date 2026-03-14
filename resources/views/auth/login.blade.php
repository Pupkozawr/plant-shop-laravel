@extends('layouts.app')
@section('content')
<div class="card" style="max-width:480px;margin:auto"><h1>Вход</h1><form method="POST" action="{{ route('login') }}">@csrf<label>Email<input type="email" name="email" value="{{ old('email') }}"></label><label>Пароль<input type="password" name="password"></label><button class="btn">Войти</button></form></div>
@endsection
