<?php

namespace App\Http\Controllers\NSH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerRequest extends Controller
{
    public function PartnerRequest(){
        
        return view('nsh.partner_request');
    }
}
