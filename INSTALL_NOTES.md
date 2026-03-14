# Дополнительные действия
Для Laravel 11 зарегистрируйте middleware в `bootstrap/app.php`:
```php
->withMiddleware(function ($middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
    ]);
})
```
