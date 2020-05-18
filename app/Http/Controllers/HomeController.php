<?php

namespace App\Http\Controllers;

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
       /*  $request->session()->flash('success', 'testing satisfactorio');
        $request->session()->flash('warning', 'testing warning');
        $request->session()->flash('error', 'testing error');
        */
        return view('home'); 

    }
}
