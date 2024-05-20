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
        return view('NSH.index');
    }

    public function countrymaster()
    {
        return view('NSH.countries_master');
    }

    public function statemaster(){
        return view('NSH.state_master');
    }
    public function citymaster(){
        return view('NSH.city_master');
    }
}
    