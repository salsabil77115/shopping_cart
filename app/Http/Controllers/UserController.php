<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use \Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //call signUp page
    public function getSignup()
    {
        return view('user.signup');
    }

    //sign up function
    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();

        Auth::login($user);

        return redirect()->route('user.profile');
    }

    //call sinIn page
    public function getSignin()
    {
        return view('user.signin');
    }

    //login function
    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }

    //get profile page
    public function getProfile()
    {
        return view('user.profile');
    }

    //call logout function
    public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
