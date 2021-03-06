<?php

namespace App\Http\Controllers;
use Gate;

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
        if (Gate::denies('access-admin')) {
            return view('home');
        }
            return view('admin/adminhome');
    }
}
