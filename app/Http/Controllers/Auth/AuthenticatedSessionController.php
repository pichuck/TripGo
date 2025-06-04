<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return redirect('/');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        $roles = $user->roles->pluck('name')->toArray();

        $users = [
            'users',
        ];

        if (array_intersect($roles, $users)) {
            return redirect()->route('home');
        }

        $admin = [
            'administrator',
        ];

        if (array_intersect($roles, $admin)) {
            return redirect()->route('dashboard');
        }

        $superadmin = [
            'administrator',
        ];

        if (array_intersect($roles, $superadmin)) {
            return redirect()->route('dashboard');
        }

        return redirect('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
