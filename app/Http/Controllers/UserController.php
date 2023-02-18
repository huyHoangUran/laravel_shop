<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show register /create form
    public function create(){
        return view('users.register');
    }
    
    // Create A new User
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6'
        ]);

        // Hash password
        $formFields['password']  = bcrypt($formFields['password']);

        $user = User::create($formFields);

        // Login
        auth()->login($user);
        return redirect('/')->with('message','User created and Logged in');
    }

    //Logout user
    public function logout(Request $request){
        auth()->Logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message','You have been logged out');
    }
    //show login form
    public function login(){
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','you are now logged in');
        }
        return back()->withErrors(['email'=>'invalid Credentials'])->onlyInput('email');
    }
}
