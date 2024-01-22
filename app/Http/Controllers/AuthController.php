<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|string',
           ]);

           $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->input('password')
           );

           if(Auth::attempt($user_data))
           {
            return redirect('/todo');
           }
           else
           {
            return back()->with('error', 'Wrong Login Details');
           }
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:10|max:10|unique:users,phone',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
        ]);
        
        // Check if the validation fails
        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        // If validation passes, create the user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),

        ]);

        return redirect('/register')->with('success', 'User created successfully.');

    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
