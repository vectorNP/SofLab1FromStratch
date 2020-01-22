<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersLoginController extends Controller
{
    //

    // do Verification from database   
    public function submit( Request  $request ){


        $request->session()->flash('userAuth',$request->input('uname'));
        return redirect('users_home');
        // print_r($request->input());


    }
}
