<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        $user = Auth::user();
        return view('admin.dashboard',
            [
                'title' => "Dashboard | ",
                'user' => $user
            ]
        );
    }

    public function login(): View
    {
        return view('admin.login',
            [
            "title" => "Login | "
            ]
        );
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function authenticate(LoginFormRequest $request): RedirectResponse
    {
        // Form inputs are valid.

        $credentials = $request->validated();

        if (!Auth::attempt($credentials))
        {
            return redirect()->back()->withErrors(
                [
                    'invalid' => 'Invalid email or password'
                ]
            );
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));

    }

}
