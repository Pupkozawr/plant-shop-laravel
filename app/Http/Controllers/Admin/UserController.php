<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
class UserController extends Controller {
    public function index(){ return view('admin.users.index',['users'=>User::latest()->paginate(15)]); }
    public function create(){ return view('admin.users.create'); }
    public function store(StoreUserRequest $request){ User::create($request->validated()); return redirect()->route('admin.users.index')->with('success','Пользователь создан'); }
    public function edit(User $user){ return view('admin.users.edit', compact('user')); }
    public function update(UpdateUserRequest $request, User $user){ $data = $request->validated(); if (empty($data['password'])) unset($data['password']); $user->update($data); return redirect()->route('admin.users.index')->with('success','Пользователь обновлен'); }
    public function destroy(User $user){ if (auth()->id()===$user->id) return back()->withErrors(['delete'=>'Нельзя удалить самого себя']); $user->delete(); return back()->with('success','Пользователь удален'); }
}
