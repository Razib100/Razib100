<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\facades\DB;
use App\User;

class LoginController extends Controller
{

    public function index()
    {
        return view('travelia.login');
        
    }

    public function login_submit(Request $req){

        $username=$req->username;
        $password=$req->password;

        $user=User::where('username',$username)
                  ->where('password',md5($password))
                  ->first();
        if(!empty($user)){
            $req->session()->put("correctlogin","successful");
            $req->session()->put('username',$username);
            $req->session()->put('usertype',$user->usertype);
            if($req->remember){
                Cookie::queue(Cookie::make('username', $username, 60));
                Cookie::queue(Cookie::make('password', $password, 60));
                
                
            }
            else{

                Cookie::queue(Cookie::make('usermail', "", 60));
                Cookie::queue(Cookie::make('password', "", 60));
                
            }
            if($user->usertype=="Admin"){

                return redirect('/travelia');

            }
            else if($user->usertype=="Writer"){
                return redirect('/travelia');
            }
            else{
                return redirect('/travelia');//for Viewer
            }
        }
        else{
            $req->session()->put("correctlogin","unsuccessful");
            return redirect('/travelia');
        }

    }
}
