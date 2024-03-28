<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(){

        $request->validate([
              'UserName' => 'required|min:2|max:12',
              'MailAdress' => 'required|min:5|max:40|unique:users,mail|email:filter,dns',
              'Password' => 'required|min:8|max:20|alpha_num',
              'PasswordConfirm' => 'required|min:8|max:20|alpha_num|confirmed'
        ]);
        return view('');
    }
}
