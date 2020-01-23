<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsersRegisterController extends Controller
{
    //

    public function register(){
        return view('auth.register');
    }


   
   
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
    
    DB::table('users')->insert(
        [
            'name' => $request->input('name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'profile_image' => $request->input('profile_image'),
            'name_devnagri' => $request->input('name_devnagri'),
        ]
    );
    


        return redirect('login');
        // print_r($request->input());
    }

}
