<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function loginValidate(Request $req){

        if($id=$this->checkLoginBD($req)){

            $user = new UsersModel();
            $user->id = $id;
            $user->login = $req->input('login');
            $user->password = $req->input('login');

            session_start();
            $_SESSION['user'] = $user;

            return redirect()->route('/');

        }else{
            $error = "введены некоректные данные";
        }
    }

    public function checkLoginBD($dd){

        $users = new UsersModel();
        $users = $users->all();

        foreach ($users as $user){
            if($user->login == $dd->input('login')){
                if(password_verify($dd->input('password'), $user->hashpass)){
                    return $user->id;
                }
            }
        }

        return false;
    }

    public function unLogin(){
        session_start();
        unset($_SESSION['user']);

        return redirect()->route('/');
    }
}
