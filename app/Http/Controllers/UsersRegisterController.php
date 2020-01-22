<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersRegisterController extends Controller
{
    //
    public function submit(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'min:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', 'min:8', 
            'same:password_confirmation'] ,
            'password_confirmation' => ['min:8'], 
            'devnagri_name' => ['min:5']  

        ],
        ['name.required' => 'abey nam to dal']
    );

        print_r($request->input());
    }

}
