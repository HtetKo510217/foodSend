<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create() {
        return view('customers.create');
    }

    public function store() {
        $formData = request()->validate([
            'name' => ['required'],
            'email' => ['required',Rule::unique('customers','email')],
            'password' =>['required','max:255','min:8'],
            'address' =>['required'],
            'phone' => ['required'],
        ]);
        $user = User::create($formData);
        auth()->login($user);
        // dd($formData);

        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/')->with('success','Good By');
    }

    public function login() {
        return view('customers.login');
    }

    public function login_store() {
        $formData = request()->validate([
                'email' => ['required','email','max:255',Rule::exists('users','email')],
                'password' => ['required','max:255','min:8'],
        ],[
            'email.exists' => 'your email does not exit',
        ]);

        if( auth()->attempt($formData)) {
            return redirect('/')->with('success','Welcome Back');
           }else {
            return redirect()->back()->withErrors([
               'email' => 'Your email or password is wrong',
            ]);
        }
    }
}
