<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller {
    public function showLogin(){ return view('auth.login'); }
    public function login(LoginRequest $request): RedirectResponse {
        if (!Auth::attempt($request->validated(), $request->boolean('remember'))) return back()->withErrors(['email'=>'Неверный email или пароль'])->withInput();
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    public function showRegister(){ return view('auth.register'); }
    public function register(RegisterRequest $request): RedirectResponse {
        $user = User::create(['name'=>$request->name,'email'=>$request->email,'password'=>$request->password,'role'=>User::ROLE_CUSTOMER]);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/')->with('success','Регистрация выполнена');
    }
    public function logout(Request $request): RedirectResponse {
        Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken(); return redirect('/');
    }
}
