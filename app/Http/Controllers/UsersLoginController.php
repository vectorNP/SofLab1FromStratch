<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth;

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


    public function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Lf489EUAAAAAINZ4Xp8cmse5FCo13zPU-aibUNx',
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $res = curl_exec($ch);
        curl_close($ch);

        return json_decode($res, true);
    }

    



    // do Verification from database   
    public function submit( Request  $request ){


        // Call the function CheckCaptcha
        $result = UsersLoginController::CheckCaptcha($_POST['g-recaptcha-response']);

        if ($result['success']) {
            //If the user has checked the Captcha box

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
        
        } else {
            // If the CAPTCHA box wasn't checked
           echo '<script>alert("Error Message");</script>';
           return redirect('login');
        }
       

        // //$current_table= DB::table('users')->where('name','=',$request->input('uname'))->get();
        
        // $current_person = DB::table('users')->where('name',$request->input('uname'))->first();

        // if(is_null($current_person)){
            
        //     return redirect('login');
        //     //return "Invalid User".$request->input('uname').$request->input('password');
            
        // }else{
            
            

        //     if($current_person->password == $request->input('password')){

        //         //user authenticated so start the session
        //         $request->session()->put('userAuth',$request->input('uname'));

        //         return redirect('users_home');
        //     }else{
        //         //print_r($current_person);
        //         return redirect('login');
        //     }

        // }

    }

    public function logout(Request $request){

        //1
        $request->session()->flush();
        
        //2
        // session()->flush();
        // session()->save();  

        //3
        // Auth::logout();
        // Session::flush();

        return redirect('login');


    }


}
