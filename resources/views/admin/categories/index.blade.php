@extends('layouts.app')
@section('content')
<h1>Категории</h1><p><a class="btn" href="{{ route('admin.categories.create') }}">Добавить категорию</a></p><table><tr><th>ID</th><th>Название</th><th>Описание</th><th>Родитель</th><th></th></tr>@foreach($categories as $category)<tr><td>{{ $category->id }}</td><td>{{ $category->name }}</td><td>{{ $category->description }}</td><td>{{ $category->parent?->name ?? '—' }}</td><td><a class="btn secondary" href="{{ route('admin.categories.edit', $category) }}">Изменить</a> <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display:inline">@csrf @method('DELETE')<button class="btn danger">Удалить</button></form></td></tr>@endforeach</table>
@endsection
