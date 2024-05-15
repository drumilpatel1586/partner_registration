<?php

namespace App\Http\Controllers\NSH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NSHController extends Controller
{
    public function dashboard(){
        return view('nsh.index');
    }
}
