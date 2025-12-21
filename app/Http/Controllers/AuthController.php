<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Import the Str facade for random string generation
use Spatie\Permission\Models\Role;
use Session;
use App\Models\User;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    
        public function postRegistration(Request $request)

    {  

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|digits:10|unique:users',


        ]);

  

        if ($validator->fails()){

            return response()->json([

                    "status" => false,

                    "errors" => $validator->errors()

                ]);

        }

       $randomPassword = Str::random(10);
        $data = $request->all();
        $data['password'] = Hash::make($randomPassword);
        $user = User::create($data);
        $user->assignRole([2]);
        return response()->json([
            "status" => true, 
            "message" =>"Register Successfully Please Login!"
        ]);



    }

    public function postLogin(Request $request)

    {

  

        $validator = Validator::make($request->all(), [

            'mobile' => 'required',
        ]);

  

        if ($validator->fails()){

            return response()->json([

                    "status" => false,

                    "errors" => $validator->errors()

                ]);

        } else {
            $user = User::where('mobile',$request->mobile)->first();
            if ($user) 
                {
               Auth::login($user);
                return response()->json([

                    "status" => true, 
                ]);

            } else {

                return response()->json([

                    "status" => false,

                    "errors" => ['mobile'=>["Account not exists."]]

                ]);

            }



        }

    }


        public function logout() {

        Session::flush();

        Auth::logout();
        return Redirect('/');

    }


}
