<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersEditController extends Controller
{
    //

    public function submit(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'min:10'],
            'password' =>['required', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', 'min:8', 
            'same:password_confirmation'] ,
            'password_confirmation' => ['min:8'], 
            'devnagri_name' => ['min:5']  

        ],
       
    );


    //get the emale  using session's 
    //i.e select the row in users table using email as primary key
    //here email is current hardcoded so first fetch the email fomr the 
    //session and then assign it to the row 
    //rest all is working properly.

    DB::table('users')->where('name',$request->input('name'))
    ->update(
        [
            'name' => $request->input('name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'email' => 'hello@123.com',
            'password' => $request->input('password'),
            'profile_image' => $request->input('profile_image'),
            'name_devnagri' => $request->input('name_devnagri'),
        ]
    );
    

    //return redirect('login');

    print_r($request->input());

    }
}
