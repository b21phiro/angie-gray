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
        return view('admin.dashboard');
    }

    public function login(): View
    {
        return view('admin.login');
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
            return back()->withErrors([
                'email' => 'Invalid email or password'
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));

    }

}
