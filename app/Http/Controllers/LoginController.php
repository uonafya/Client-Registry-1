<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{

    //constructor

    public function login(Request $reqs)
    {
        // dd(request('email'), request('password'));

        $this->validate($reqs, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if(auth()->attempt(array('email' => request('email'), 'password' => request('password'))))
        {
            if (auth()->user()->is_admin == 1) {
                // return redirect()->route('admin.home');
                return redirect()->intended('search');
                // view('index');
            }else{
                // return redirect()->route('home');
                return redirect()->intended('search');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }
    public function documentation(){
        return view('layouts.documentation');
    }
}
