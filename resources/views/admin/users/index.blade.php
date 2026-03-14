@extends('layouts.app')
@section('content')
<h1>Пользователи</h1><p><a class="btn" href="{{ route('admin.users.create') }}">Добавить пользователя</a></p><table><tr><th>ID</th><th>ФИО</th><th>Email</th><th>Роль</th><th></th></tr>@foreach($users as $user)<tr><td>{{ $user->id }}</td><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td>{{ $user->role }}</td><td><a class="btn secondary" href="{{ route('admin.users.edit', $user) }}">Изменить</a> <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display:inline">@csrf @method('DELETE')<button class="btn danger">Удалить</button></form></td></tr>@endforeach</table><div style="margin-top:20px">{{ $users->links() }}</div>
@endsection
