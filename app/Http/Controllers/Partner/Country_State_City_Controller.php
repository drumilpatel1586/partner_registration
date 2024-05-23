<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

class Country_State_City_Controller extends Controller
{
    public function getcountries()
    {
        $countries = DB::table('countries')->where('is_active', true)->get()->toArray();
        return $countries;
    }

    public function renderCountriesView()
    {
        $countries = $this->getcountries();
        // dd($countries);
        return view('partner/partner_registration', ['countries' => $countries]);
    }

    public function getStates($country_id)
    {
        $states = DB::table('states')->where([['is_active', true], ['country_id', $country_id]])->get();

        return response()->json($states);
    }

    public function getCities($state_id)
    {
        $cities = DB::table('cities')->where([['is_active', true], ['state_id', $state_id]])->get();

        return response()->json($cities);
    }

    public function captcha_genrator()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return view('partner.partner_registration', ['captcha' => $randomString]);
    }
}
