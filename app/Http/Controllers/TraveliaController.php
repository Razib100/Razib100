<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Validator;
use App\User;
use App\Userinfo;
use App\Travelplace;

class TraveliaController extends Controller
{
    public function index(Request $req){

       

        if(Cookie::get('usermail') !== ""){
            $login[0]=Cookie::get('usermail');
            $login[1]=Cookie::get('password');
            $login[3]="checked";
            $login[4]=""; //session value will store 
            $login[5]=""; //session value will store 
           
        }
        else{

           
            $login[0]="";
            $login[1]="";
            $login[3]="";
            $login[4]=""; //session value will store 
            $login[5]=""; //session value will store 

        }
        if($req->session()->has('correctreg')){

            if($req->session()->get('correctreg')=="unsuccessful"){
                $login[4]="unsuccessful";
            }
            else{
                $login[4]="successful";

            }
            $req->session()->forget('correctreg');
            
        }
        if($req->session()->has('correctlogin')){

            if($req->session()->get('correctlogin')=="unsuccessful"){
                $login[5]="unsuccessful";
            }
            else{
                $login[5]="successful";

            }
            $req->session()->forget('correctlogin');
            
        }
        return view('travelia.index')->with('login',$login);
    }

    public function registration()
    {
        return view('travelia.registration');
    }

    public function registration_submit(Request $req){

        if($req->usertype=="Admin"){

            $validation=Validator::make($req->all(),[
                'fullname'=>'required',
                'username'=>'required|unique:App\Userinfo,username',
                'email'=>'required|unique:App\Userinfo,email',
                'phoneno'=>'required',
                'usertype'=>'required',
                // 'address'=>'required',
                'password'=>'required|min:12|confirmed'
                
                ]);
                if($validation->fails()){
                    $req->session()->put("correctreg","unsuccessful");
                    return back()
                            ->with('errors',$validation->errors())
                            ->withInput();
                
                }
                else{
                    if(strpos($req->password,"@") !== false){
                        $req->session()->put("correctreg","unsuccessful");
                        return back()
                            ->with('password_errors','must contain minimum 12 digits, at list 1 letter (upper & lower), number & symbol Except @.')
                            ->withInput();
                    }
                    else if(!preg_match("/[a-z]/i", $req->password)){
                        $req->session()->put("correctreg","unsuccessful");
                        return back()
                            ->with('password_errors','must contain minimum 12 digits, at list 1 letter (upper & lower), number & symbol Except @.')
                            ->withInput();
                    }
                    else if(!preg_match("/[0-9]/", $req->password)){
                       
                        $req->session()->put("correctreg","unsuccessful");
                        return back()
                            ->with('password_errors','must contain minimum 12 digits, at list 1 letter (upper & lower), number & symbol Except @.')
                            ->withInput();
                    }
                    else{
                        
                    }
                }
            
        }
        if($req->usertype=="Writer"){

            $validation=Validator::make($req->all(),[
                'fullname'=>'required',
                'username'=>'required|unique:App\Userinfo,username',
                'email'=>'required|unique:App\Userinfo,email',
                'phoneno'=>'required',
                'usertype'=>'required',
                // 'address'=>'required',
                'password'=>'required|min:8|confirmed'
                
                ]);
                if($validation->fails()){
                    $req->session()->put("correctreg","unsuccessful");
                    return back()
                            ->with('errors',$validation->errors())
                            ->withInput();
                
                }
                else{
                    if(preg_match('/(.)\\1{2}/i', $req->password)){
                        $req->session()->put("correctreg","unsuccessful");
                        return back()
                            ->with('password_errors','must contain minimum 8 digits, letter, number & symbol, three consecutive identical characters not allowed')
                            ->withInput();
                    }
                    else if(!preg_match("/[a-z]/i", $req->password)){
                        $req->session()->put("correctreg","unsuccessful");
                        return back()
                            ->with('password_errors','must contain minimum 8 digits, letter, number & symbol, three consecutive identical characters not allowed')
                            ->withInput();
                    }
                    else if(!preg_match("/[0-9]/", $req->password)){
                    
                        $req->session()->put("correctreg","unsuccessful");
                        return back()
                            ->with('password_errors','must contain minimum 8 digits, letter, number & symbol, three consecutive identical characters not allowed')
                            ->withInput();
                    }
                    else{
                        
                    }
                }
            
        }
        if($req->usertype=="Viewer"){

            $validation=Validator::make($req->all(),[
                'fullname'=>'required',
                'username'=>'required|unique:App\Userinfo,username',
                'email'=>'required|unique:App\Userinfo,email',
                'phoneno'=>'required',
                'usertype'=>'required',
                // 'address'=>'required',
                'password'=> 'required|min:6|max:16|confirmed|regex:/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/',
                
                ],[
                   'password.regex' => 'must contain minimum 6 digits, maximum 16-digit,at least one letter & one number'
                ]);
                
                if($validation->fails()){
                    return back()
                            ->with('errors',$validation->errors())
                            ->withInput();
                
                }
                          
        }

        
        $req->session()->put("correctreg","successful");

            $userinfo=new Userinfo();
            $userinfo->email=$req->email;
            $userinfo->fullname=$req->fullname;
            $userinfo->username=$req->username;
            $userinfo->phoneno=$req->phoneno;
            $userinfo->address=$req->address;
            $userinfo->usertype=$req->usertype;
            $userinfo->password=md5($req->password);

            $userinfo->save();


            $user=new User();
            $user->username=$req->username;
            $user->password=md5($req->password);
            $user->usertype=$req->usertype;
            $user->save();


            return redirect('/travelia');

    }

    public function destinations(Request $req,$destination){
        $place=Travelplace::where('division',$destination)
                        ->get();

        return view('travelia.traveliaDestinations')->with('result',$place);
    }
}
