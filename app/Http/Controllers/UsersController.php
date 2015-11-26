<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Validator;

class UsersController extends Controller
{
    //get login page

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Handle login form.
     *
     * @method POST
     *
     * @return Redirect 301
     */
    public function postLogin()
    {
        $validator = Validator::make(Input::all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(Input::except('_token'))) {
            return Redirect::route('search')->with('success', 'Logged');
        } else {
            return Redirect::route('login')->with('error', 'Bad credentials');
        }
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @method POST
     *
     * @param  array  $data
     *
     * @return User
     */
    protected function postRegister()
    {
        $validator = Validator::make(Input::all(), [
            'name' => 'required',
            'firstname' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return Redirect::route('register')->with('error', 'Validation error')->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();
        Auth::login($user);

        return Redirect::route('search')->with('success', 'You are now registered and logged in');
    }

    /**
     * Sign out current user.
     *
     * @method GET
     *
     * @return Redirect 301
     */
    public function getLogout()
    {
        Auth::logout();

        return Redirect::route('login')->with('success', 'You have logged out!');
    }

    public function getLogin()
    {
        return view('users.login');
    }

    public function registerPage()
    {
        return view('users.register');
    }
}
