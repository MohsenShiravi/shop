<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    public function edit(User $user)
    {
        $roles=Role::all();
        return view('admin.users.edit',['user'=>$user,'roles'=>$roles]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'role_id' => $request->get('role_id'),
        ]);
        return redirect(route('users.index'));
    }

}
