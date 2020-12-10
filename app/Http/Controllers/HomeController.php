<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //Session::get('user.id', auth()->user()->id);
        // Session::push('user.id',auth()->user()->id);
        
        Session::put('user.id', auth()->user()->id);
        Session::put('user.name', auth()->user()->name);
        if(auth()->user()->profile != null){
            Session::put('user.avatar', auth()->user()->profile->avatar);
        }

        // dd(Session::get('user.id'));
        return view('home');
    }
}
