<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }


    public function show(Request $request)
    {
        $user = $request->user();
        Inertia::share('user', $user);
        return Inertia::render('Auth/EditRegister');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ]);
            return redirect(route('dashboard'));
        } catch (\Exception $e) {
            // Retornar um status de erro
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
        event(new Registered($user));
        // return redirect(route('dashboard'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => 'required',
            'passwordActual' => 'required',
        ]);

        $userVerif = $request->user();

        try {
            if (!Hash::check($request->passwordActual, $userVerif->password)) {
                return response()->json(['errors' => 'Senha incompativel']);
            } else {
                User::where('id', $userVerif->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ]);

                // return redirect(route('dashboard'))->with('success', 'Perfil atualizado com sucesso.');
                return redirect(route('/'));
            }
        } catch (\Exception $e) {
            // Em caso de erro, você pode retornar uma resposta JSON com uma mensagem de erro
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
