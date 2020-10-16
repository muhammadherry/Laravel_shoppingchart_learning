<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use resources\views\shop;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    public function postsignup(Request $request)
    {
        $this -> validate($request,[
            'email'=>'email|required|unique:users',
            'password'=>'required|min:4'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password'=>($request->input('password'))
        ]);
        $user -> save();
        Auth::login($user);
        return redirect()->route('user.profile');
    }
    public function getsignup()
    {
       return view('user.signup') ;
    }

    public function postsignin(Request $request)
    {
        $this -> validate($request,[
            'email'=>'email|required',
            'password'=>'required|min:4'
        ]);

        if(Auth::attempt(['email'=> $request->input('email'),'password'=>$request->input('password')])){
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }
    public function getsignin()
    {
       return view('user.signin') ;
    }

    public function profile()
    {
       return view('user.profile') ;
    }
    public function logout()
    {
       Auth::logout();
       return redirect()->back();   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
