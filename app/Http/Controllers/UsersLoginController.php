<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersLoginController extends Controller
{
    //



    public function login(Request $request){
         //$request->session()->flush();
         return view('auth.login');
    }


    public function show_home(){
        return view('auth.users_home');
    }

    public function show_edit(){
        return view('auth.edit');
    }


    // do Verification from database   
    public function submit( Request  $request ){

       

        //$current_table= DB::table('users')->where('name','=',$request->input('uname'))->get();
        
        $current_person = DB::table('users')->where('name',$request->input('uname'))->first();

        if(is_null($current_person)){
            
            return redirect('login');
            //return "Invalid User".$request->input('uname').$request->input('password');
            
        }else{
            
            

            if($current_person->password == $request->input('password')){

                //user authenticated so start the session
                $request->session()->put('userAuth',$request->input('uname'));

                return redirect('users_home');
            }else{
                //print_r($current_person);
                return redirect('login');
            }

        }

    }

    public function logout(Request $request){

        $request->session()->flush();  
        return redirect('login');


    }


}
