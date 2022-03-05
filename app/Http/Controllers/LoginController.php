<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
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
                return 'normal user';
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }
}
