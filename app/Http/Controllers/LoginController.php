<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login', array());
    }

    public function doLogin()
    {
        $req = Request::capture();
        $validator = Validator::make($req->all(), array(
            'email' => 'required|email',
            'password' => 'required'
        ));

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        } else {
            $userdata = array(
                'email' => $req->input('email'),
                'password' => $req->input('password')
            );

            if (Auth::attempt($userdata)) {
                return Redirect::to('/home');
            } else {
                return Redirect::to('/')
                    ->withErrors("Usuario o contraseña incorrectos");
            }
        }
    }
}
