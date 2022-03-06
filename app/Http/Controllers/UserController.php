<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use phpDocumentor\Reflection\PseudoTypes\False_;

class UserController extends Controller
{
    public function login(Request $reqs)
    {
        $this->validate($reqs, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => request('email'), 'password' => request('password'))))
        {
            if (auth()->user()->is_admin == 1) {
                // return redirect()->route('admin.home');
                return redirect()->intended('landing');
                // view('index');
            } else {
                // return redirect()->route('home');
                return 'normal user';
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return redirect()->to('/search');
    }

    public function new_user()
    {

        return view('layouts.new_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request   User::create($request->only([

     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pwd = $request->input('password');
        // dd($pwd);
    //    $hash = Hash::make();

       $req_user = $request->only("name","email","password","facility_id");
        // dd($req_user);

        User::create($request->only([

            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->password),
            'facility_id' => $request->input('facility_id'),

        ]));
        // dd($request->only());

        return back()->with(['success' => 'Registered successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
