<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request) {
        $page_type = 'login';
        return view('Auth', [
            'page_type' => $page_type,
        ]);
    }

    public function register(Request $request) {
        $page_type = 'register';
        return view('Auth', [
            'page_type' => $page_type,
        ]);
    }

    public function user(Request $request) {
        if (auth()->user()) {
            return view('user', [
                'user' => substr(auth()->user()->email, 0, -10) 
            ]);
        }
    }

    public function generate_token(Request $request) {
        if (auth()->user()) {
            $user = User::find(auth()->user()->id);

            $user->token = $request->token;
            $user->save();
            
            return redirect('/xxx-m2.wsr.ru/user');
        }
    }

    public function authenticate(Request $request) {
        $form = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth() -> attempt($form)) {
            $request->session()->regenerate();

            return redirect('/xxx-m2.wsr.ru');
        }
        
        return back() -> withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function addNewUser(Request $request) {
        $form = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
        ]);
        
        $form['password'] = bcrypt($form['password']);

        $user = User::create([
            'email' => $form['email'],
            'password' => $form['password'],
            'token' => '',
        ]);

        auth() -> login($user);

        return redirect('/xxx-m2.wsr.ru');
    }

    public function logout(Request $request) {
        auth() -> logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/xxx-m2.wsr.ru/login');
    }
}
