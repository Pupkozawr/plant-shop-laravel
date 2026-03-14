@extends('layouts.app')
@section('content')
<div class="card" style="max-width:700px"><h1>Форма обратной связи</h1><form method="POST" action="{{ route('contact.store') }}">@csrf<label>Имя<input type="text" name="name" value="{{ old('name', auth()->user()->name ?? '') }}"></label><label>Email<input type="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}"></label><label>Тема<input type="text" name="subject" value="{{ old('subject') }}"></label><label>Сообщение<textarea name="message" rows="6">{{ old('message') }}</textarea></label><button class="btn">Отправить</button></form></div>
@endsection
