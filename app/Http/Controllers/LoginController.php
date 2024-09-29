<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Models;
use Qudratom\Response\JsonResponse;
use Qudratom\Response\Response;

use Illuminate\Support\Facades\View;

class LoginController extends Controller {
    public function __construct()
    {
    }
    /**
     * Show the profile for the given member.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        if (Auth::check()) {
            //already logged in ?
            return redirect()->intended('member') ;
        }

		return View::make('login.page') ;
    }
    function logout()
    {
        Auth::logout();

        return redirect()->intended('auth/login') ;
    }
    /**
     * @return mixed
     */
    public function onSubmit()
	{
        $username =  Input::get('username') ;
        $password =  Input::get('password') ;

        if (Auth::attempt(['username' => $username, 'password' => $password ])) {
            // Authentication passed...
            $obj = new Response() ;
            $data = $obj->bulider()->setStatus(true)->setMessage('Login successful')->addScript("window.location.href='" . url('member') . "';")->build() ;
            return $obj->send($data) ;
        }
        else
        {
            $obj = new Response() ;
            $data = $obj->bulider()->setStatus(false)->setMessage('Incorrect username or password.')->build() ;
            return $obj->send($data) ;
        }
	}
}