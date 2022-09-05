<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $normalUser = Role::query()
            ->where('title', 'normal user')
            ->first();


        $user = User::query()->create([
            'role_id' => $normalUser->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        auth()->login($user);

        return redirect('/');
    }
}
