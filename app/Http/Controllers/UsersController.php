<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator, Input, Auth, Redirect, Str;
use App\User;


class UsersController extends Controller {

	//get login page

	public function getLogin()
	{
		return view('users.login');
	}


  public function registerPage()
  {
      return view('users.register');
  }
	//logging in the user with validation

	public function postLogin(){
      $data = [
          'email' => Input::get('email'),
          'password' => Input::get('password')
      ];
			if(Auth::attempt($data)) {
		      return Redirect::route('search')->with('success', 'Logged');
			} else {
          return Redirect::route('login')->with('error', 'Bad credentials');
      }

	}

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|confirmed|min:6',
      ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  protected function postRegister()
  {
      $data = [
          'name' => Input::get('name'),
          'email'=> Input::get('email'),
          'password' => Input::get('password')
      ];
      if($this->validator($data)) {
          $user = new User;
          $user->name = $data['name'];
          $user->email = $data['email'];
          $user->password = bcrypt($data['password']);
          $user->save();
          Auth::login($user);
          return Redirect::route('search')->with('success', 'You are now registered and logged in');
      }else{
        return Redirect::route('login')->withErrors($validator)->withInput();
      }
  }

	//logging out the user(admin)

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('login')->with('success', 'You have logged out!');
	}
}
