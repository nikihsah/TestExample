<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use Exception;
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

            $role = DB::table('users_models')->where('id','=',$id)->get();
            $user->role = $role[0]->role;

            session_start();
            $_SESSION['user'] = $user;

            return redirect()->route('/');

        }else{
            $error = "введены некоректные данные";
        }
        return redirect()->route('login', ['error' =>$error]);
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

    public function registerValidate(Request $req){
        $NewUser = new UsersModel();
        $users = $NewUser->all();

        try{
            foreach($users as $user){
                $this->loginCorrect($user, $req);
                $this->emailCorrect($user, $req);
                $this->passwordCorrect($req);

                $NewUser->login = $req->input('login');
                $NewUser->email = $req->input('email');
                $NewUser->hashpass = password_hash($req->input('password'), PASSWORD_DEFAULT);

                $NewUser->save();

                session_start();
                $_SESSION['user'] = $NewUser;

                return redirect()->route('/');
            }
        }catch(Exception $e){
            $error = $e;
        }
        return redirect()->route('register', ['error' => $error]);
    }

    private function loginCorrect($user, $req)
    {
        if ($user->login == $req->input('login')){
            throw new Exception('Данное имя пользователя уже используется');
        }
        if (!(strlen($req->input('login')) > 6)){
            throw new Exception('Имя пользователя должно содержать больше 6 символов');
        }
    }

    private function emailCorrect($user, $req)
    {
        if ($user->email == $req->input('email')) {
            throw new Exception('Данная почта уже используется');
        }
        if(!filter_var($user->email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('Почта записана некоректно');
        }
    }

    private function passwordCorrect($req)
    {
        if(!preg_match('#^\S*(?=\S{8,25})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#', $req->input('password'))){
            throw new Exception('Пароль должен содержать не менее 8 символов, иметь прописные и заглавные буквы');
        }
    }
}
