<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $user = User::query()
            ->where('email', $request->get('email'))
            ->first();

        if(!Hash::check($request->get('password'), $user->password)){
            return back()->withErrors('رمز عبور صحیح نمی باشد');
        }

        auth()->login($user);

        return redirect('/');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
