@extends('layouts.app')
@section('content')
<div class="card" style="max-width:700px"><h1>Редактировать категорию</h1><form method="POST" action="{{ route('admin.categories.update', $category) }}">@csrf @method('PUT')<label>Название<input type="text" name="name" value="{{ old('name', $category->name) }}"></label><label>Описание<textarea name="description">{{ old('description', $category->description) }}</textarea></label><label>Родительская категория<select name="parent_id"><option value="">—</option>@foreach($categories as $item)<option value="{{ $item->id }}" @selected(old('parent_id', $category->parent_id)==$item->id)>{{ $item->name }}</option>@endforeach</select></label><button class="btn">Сохранить</button></form></div>
@endsection
