<?php


// Authentication mechanism
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
   /**
      * Handling authentication request
      *
      * @return Response
   */
   
   public function authenticate() {
      if (Auth::attempt(['email' => $email, 'password' => $password])) {
      
         // Authentication passed...
         return redirect()->intended('dashboard');
      }
   }
}