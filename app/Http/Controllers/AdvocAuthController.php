<?php

namespace App\Http\Controllers;

use App\Models\User;
use Helper\Generator;
use Helper\ResponseHelper;
use Illuminate\Http\Request;
use Validator;

class AdvocAuthController extends Controller
{

   public function join(Request $request) {

       $validator = Validator::make($request->all(), [
           'email' => 'required|unique:users,email|email|max:255',
           'name' => 'required|alpha|unique:users,name|max:255',
           'password' => 'required',
       ]);

       if ($validator->fails()) {
           $errors = json_decode($validator->errors(), true);
           $payload = ResponseHelper::prepareResponsePayload(201, '', $errors);
           return response()->json($payload);
       }

       $username = $request->input('name');
       $email = $request->input('email');
       $password =  password_hash($request->input('password'), PASSWORD_DEFAULT);

       $access_token = Generator::getAccessToken();

       User::create([
           'name' => $username,
           'email' => $email,
           'password' => $password,
           'access_token' => $access_token
       ]);

       $payload = ResponseHelper::prepareResponsePayload(200,
           'Registration Completed Successfully');

       return response()->json($payload);
   }

   public function login(Request $request) {

       $login_name = $request->input('login_name');
       $password = $request->input('password');

       $user = User::where('email', $login_name)
               ->orWhere('name', $login_name)
               ->first();

       if($user){
           if(password_verify($password, $user->password)){
               $payload = ResponseHelper::prepareResponsePayload(200, '',
                   ['access_token' => $user->access_token]);

               return response()->json($payload);
           }
       }

       $payload = ResponseHelper::prepareResponsePayload(201,
           'Invalid username or password');

       return response()->json($payload);
   }
}
