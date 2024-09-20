<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\Client\ClientLoginFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    public function showLoginForm():view{
        return view('client.login');
    }

    public function login(ClientLoginFormRequest $request)
{
    $credentials = $request->validated();
    $credentials['role'] = 'client';
    // Vérifie un utilisateur
    $user = User::where('numero', $credentials['numero'])->first();
    if ($user) {
        Auth::login($user);

    } else {
        $user = User::create($credentials);
        Auth::login($user);
    }
    $request->session()->regenerate();

    //Redirige l'utilisateur vers la page prévue
    return redirect()->intended(route('client.home'));
}

public function logout(){
        Auth::logout();
        return to_route('client.login');
}

}
