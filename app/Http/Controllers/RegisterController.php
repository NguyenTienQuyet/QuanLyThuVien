<?php


namespace App\Http\Controllers;


class RegisterController extends Controller
{
    public function getRegister(){
        return view('register.register');
    }
}