@extends('layouts.app')
@section('content')
<h1>Интернет-магазин растений</h1><p class="muted">Комнатные, садовые и декоративные растения для дома и офиса.</p>
<div class="grid">@foreach($categories as $category)<div class="card"><h3>{{ $category->name }}</h3><p>{{ $category->description }}</p><span class="badge">Товаров: {{ $category->products_count }}</span></div>@endforeach</div>
<h2 style="margin-top:32px">Новые товары</h2><div class="grid">@foreach($products as $product)<div class="card product-card"><div class="product-visual">{{ $product->category->name }}</div><h3 class="product-title">{{ $product->name }}</h3><div class="product-meta"><span class="badge">{{ $product->category->name }}</span><span class="price-chip">{{ $product->price }} ₽</span></div><div class="product-actions"><a class="btn" href="{{ route('catalog.show', $product) }}">Открыть</a></div></div>@endforeach</div>
@if($recent->count())<h2 style="margin-top:32px">Недавно просмотренные</h2><div class="grid">@foreach($recent as $product)<div class="card"><h3>{{ $product->name }}</h3><p>{{ $product->price }} ₽</p></div>@endforeach</div>@endif
@endsection
