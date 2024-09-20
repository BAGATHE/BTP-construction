<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminLoginFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminAuthController extends Controller
{
    public function showLoginForm():view{

        return view('admin.login');
    }

    public function login(AdminLoginFormRequest $request){
        $credentials = $request->validated();
        $credentials['role']='admin';
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.home'));
        }

        return back()->withErrors(['email'=> 'Les informations d\'identification fournies sont incorrectes.']);

    }

    public function logout(){
        Auth::logout();
        return to_route("admin.login");
    }
}
