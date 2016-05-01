<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getLogin()
    {

        $user=Auth::user();
        if($user){
            return redirect('/')->with('error','already logged in');
        }else{
            return view('auth/login');
        }
    }
    public function postLogin(UserLoginRequest $request) {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            return redirect()->intended('/')
                      ->with('success', 'You have successfully logged in as '.Auth::user()->username);

        }
        return redirect('auth/login')->with('error', 'Incorrect user credentials');
    }
    public function getLogout() {
        Auth::logout();
        return redirect('auth/login')->with('success', 'You have successfully logged off');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }
    
    public function postRegister(Request $request)
    {

        $user                       = new User;
        $user->username             = $request->input('username');
        $user->email                = $request->input('email');
        $user->password             = bcrypt($request->input('password'));
        $user->save();

        return Redirect::to ('auth.login');
    }
   
}
