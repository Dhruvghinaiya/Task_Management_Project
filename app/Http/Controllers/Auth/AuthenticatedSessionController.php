<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as ValidationValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $req)
    {
        // $request->authenticate();

        // $req->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));
        $attributes = $req->getinsertTableField();
        if(Auth::attempt(['email' => $attributes['email'], 'password' => $attributes['password']])){
                if(Auth::user()->role ==='admin'){
                    return redirect()->route('admin.dashboard');
                }
                else if(Auth::user()->role ==='employee'){
                    return redirect()->route('employee.dashboard');
                }
                else{   
                    return redirect()->route('client.dashboard');
                }   
        }   
        else{
            throw ValidationValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.',
            ]);
        }
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
