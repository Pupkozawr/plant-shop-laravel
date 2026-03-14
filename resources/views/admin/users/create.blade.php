@extends('layouts.app')
@section('content')
<div class="card" style="max-width:700px"><h1>Новый пользователь</h1><form method="POST" action="{{ route('admin.users.store') }}">@csrf<label>ФИО<input type="text" name="name" value="{{ old('name') }}"></label><label>Email<input type="email" name="email" value="{{ old('email') }}"></label><label>Пароль<input type="password" name="password"></label><label>Роль<select name="role"><option value="customer">Покупатель</option><option value="admin">Администратор</option></select></label><button class="btn">Сохранить</button></form></div>
@endsection
