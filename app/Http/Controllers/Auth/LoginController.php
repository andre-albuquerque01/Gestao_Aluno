<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['entrar']]);
    // }

    public function create(): Response
    {
        return Inertia::render('Auth/Login');
    }

    public function auth(Request $request)
    {
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.email' => 'O email não é válido'
        ]);
        if (Auth::attempt($credenciais)) :
            $request->session()->regenerate();
            return redirect(route('dashboard'));
        else :
            return redirect(route('/'));
        endif;
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
    // public function login(Request $request)
    // {
    //     $credentials = request(['email', 'password']);

    //     if (!$token = auth()->attempt($credentials)) {
    //         return response()->json(['errors' => 'Unauthorized'], 401);
    //     } else {
    //         $credenciais = $request->validate([
    //             'email' => 'required|email',
    //             'password' => 'required'
    //         ], [
    //             'email.email' => 'O email não é válido'
    //         ]);
    //         if (Auth::attempt($credenciais)) :
    //             $request->jwt()->regenerate();
    //             return redirect('dashboard');
    //         else :
    //             return redirect()->back()->with('errors');
    //         endif;
    //     }

    //     return $this->respondWithToken($token);
    // }