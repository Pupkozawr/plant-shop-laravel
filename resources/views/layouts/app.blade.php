<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title ?? 'Plant Shop' }}</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap');

		:root {
			--bg: #f6f2e9;
			--paper: #fffaf3;
			--card: #ffffff;
			--line: #e3d9c7;
			--text: #242116;
			--muted: #666253;
			--brand: #2e6b4f;
			--brand-2: #b96533;
			--danger: #b64141;
			--shadow: 0 12px 30px rgba(36, 33, 22, 0.08);
			--radius: 16px;
		}

		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			font-family: 'Manrope', sans-serif;
			color: var(--text);
			background:
				radial-gradient(circle at 8% 12%, rgba(185, 101, 51, 0.16), transparent 40%),
				radial-gradient(circle at 88% 4%, rgba(46, 107, 79, 0.17), transparent 42%),
				linear-gradient(145deg, #f7f1e6 0%, #f4f6ef 45%, #fcf7ed 100%);
			min-height: 100vh;
		}

		a {
			text-decoration: none;
			color: var(--brand);
		}

		.container {
			max-width: 1120px;
			margin: 0 auto;
			padding: 22px;
		}

		.nav {
			position: sticky;
			top: 0;
			z-index: 20;
			backdrop-filter: blur(8px);
			background: rgba(255, 250, 243, 0.85);
			border-bottom: 1px solid rgba(227, 217, 199, 0.8);
		}

		.menu {
			display: flex;
			gap: 16px;
			align-items: center;
			justify-content: space-between;
		}

		.brand {
			font-weight: 800;
			letter-spacing: 0.3px;
			color: var(--text);
		}

		.links {
			display: flex;
			gap: 10px;
			flex-wrap: wrap;
			align-items: center;
		}

		.links > a {
			padding: 8px 12px;
			border-radius: 999px;
			font-weight: 600;
			color: #2f3d2e;
		}

		.links > a:hover {
			background: #efe8d8;
		}

		.grid {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
			gap: 20px;
		}

		.card,
		.alert,
		table {
			background: var(--card);
			border: 1px solid var(--line);
			box-shadow: var(--shadow);
			border-radius: var(--radius);
		}

		.card {
			padding: 18px;
		}

		.btn {
			display: inline-block;
			border: none;
			background: linear-gradient(125deg, var(--brand), #3c8764);
			color: #fff;
			padding: 10px 14px;
			border-radius: 12px;
			font-weight: 700;
			cursor: pointer;
			transition: transform 0.15s ease, box-shadow 0.15s ease;
			box-shadow: 0 8px 18px rgba(46, 107, 79, 0.28);
		}

		.btn:hover {
			transform: translateY(-1px);
		}

		.btn.secondary {
			background: linear-gradient(125deg, #5b7d69, #7c9f82);
		}

		.btn.danger {
			background: linear-gradient(125deg, var(--danger), #ce5d5d);
			box-shadow: 0 8px 18px rgba(182, 65, 65, 0.25);
		}

		.btn.light {
			background: #efe8d8;
			color: #403927;
			box-shadow: none;
		}

		input,
		select,
		textarea {
			width: 100%;
			padding: 10px 12px;
			border: 1px solid #d8cdb9;
			border-radius: 12px;
			margin-top: 6px;
			margin-bottom: 12px;
			background: #fffdf9;
			color: var(--text);
		}

		.alert {
			padding: 12px 16px;
			margin: 12px 0;
		}

		.success {
			border-left: 5px solid var(--brand);
		}

		.error {
			border-left: 5px solid var(--danger);
		}

		table {
			width: 100%;
			border-collapse: collapse;
			overflow: hidden;
		}

		th,
		td {
			padding: 10px;
			border-bottom: 1px solid #efe5d4;
			text-align: left;
			vertical-align: top;
		}

		.row {
			display: flex;
			gap: 20px;
			align-items: flex-start;
			flex-wrap: wrap;
		}

		.w-70 {
			flex: 1 1 65%;
		}

		.w-30 {
			flex: 1 1 28%;
		}

		.muted {
			color: var(--muted);
		}

		.badge {
			display: inline-block;
			padding: 6px 10px;
			background: #f0eadb;
			border-radius: 999px;
			font-size: 12px;
			border: 1px solid #e0d5c2;
			font-weight: 600;
		}

		.stars {
			color: #cc8f21;
		}

		.product-visual {
			width: 100%;
			height: 180px;
			border-radius: 14px;
			margin-bottom: 14px;
			border: 1px solid #e7dcc8;
			background:
				linear-gradient(150deg, rgba(46, 107, 79, 0.14), rgba(185, 101, 51, 0.16)),
				repeating-linear-gradient(-32deg, #f8f4eb 0 10px, #f5eddf 10px 20px);
			display: flex;
			align-items: end;
			justify-content: start;
			padding: 12px;
			color: #4a4434;
			font-weight: 700;
			letter-spacing: 0.2px;
		}

		.product-visual.large {
			height: 250px;
		}

		.product-card {
			display: flex;
			flex-direction: column;
			gap: 10px;
			transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
		}

		.product-card:hover {
			transform: translateY(-3px);
			border-color: #d6c6ab;
			box-shadow: 0 18px 28px rgba(36, 33, 22, 0.12);
		}

		.product-title {
			margin: 0;
			font-size: 20px;
			line-height: 1.2;
		}

		.product-meta {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 8px;
			flex-wrap: wrap;
		}

		.price-chip {
			display: inline-flex;
			align-items: center;
			gap: 6px;
			padding: 7px 11px;
			border-radius: 999px;
			font-weight: 800;
			font-size: 13px;
			color: #fff;
			background: linear-gradient(120deg, #b96533, #d48352);
		}

		.price-chip::before {
			content: 'Цена';
			font-size: 11px;
			font-weight: 700;
			opacity: 0.85;
		}

		.product-actions {
			display: flex;
			justify-content: flex-start;
			margin-top: 2px;
		}

		@media (max-width: 760px) {
			.container {
				padding: 16px;
			}

			.menu {
				align-items: flex-start;
				flex-direction: column;
			}

			.links {
				width: 100%;
			}

			.links > a,
			.links > form {
				width: fit-content;
			}
		}
	</style>
</head>
<body>
	<div class="nav">
		<div class="container menu">
			<div><a class="brand" href="{{ route('home') }}">Plant Shop Atelier</a></div>
			<div class="links">
				<a href="{{ route('catalog.index') }}">Каталог</a>
				<a href="{{ route('cart.index') }}">Корзина</a>
				<a href="{{ route('contact.create') }}">Обратная связь</a>
				@auth
					<a href="{{ route('orders.my') }}">Мои заказы</a>
					@if(auth()->user()->isAdmin())
						<a href="{{ route('admin.dashboard') }}">Админ-панель</a>
					@endif
					<form action="{{ route('logout') }}" method="POST" style="display:inline">
						@csrf
						<button class="btn light">Выйти</button>
					</form>
				@else
					<a href="{{ route('login') }}">Вход</a>
					<a href="{{ route('register') }}">Регистрация</a>
				@endauth
			</div>
		</div>
	</div>

	<div class="container">
		@if(session('success'))
			<div class="alert success">{{ session('success') }}</div>
		@endif

		@if($errors->any())
			<div class="alert error">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		@yield('content')
	</div>
</body>
</html>
