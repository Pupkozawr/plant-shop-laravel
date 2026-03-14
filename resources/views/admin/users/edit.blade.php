@extends('layouts.app')
@section('content')
<div class="card" style="max-width:700px"><h1>Редактировать пользователя</h1><form method="POST" action="{{ route('admin.users.update', $user) }}">@csrf @method('PUT')<label>ФИО<input type="text" name="name" value="{{ old('name', $user->name) }}"></label><label>Email<input type="email" name="email" value="{{ old('email', $user->email) }}"></label><label>Пароль<input type="password" name="password"></label><label>Роль<select name="role"><option value="customer" @selected(old('role', $user->role)==='customer')>Покупатель</option><option value="admin" @selected(old('role', $user->role)==='admin')>Администратор</option></select></label><button class="btn">Сохранить</button></form></div>
@endsection
