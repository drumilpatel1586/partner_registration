<?php

namespace App\Http\Controllers\NSH;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PartnerRequest extends Controller
{
    public $partner;

    public function PartnerRequest()
    {

        return view('nsh.partner_request');
    }

    public function partnerapproved($partner_id)
    {
        DB::table('partners')->where('partner_id', $partner_id)->update(['admin_verified' => 1]);

        return back()->with('success', 'Partner approved Successfully');
    }
}
