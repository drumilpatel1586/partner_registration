<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Countries;

class CountriesController extends Controller
{
    public function CountryManage($countryId)
    {

        $country = Countries::find($countryId);

        if ($country) {
            if ($country->is_active) {
                $country->timestamps = false;
                $country->is_active = 0;
            } else {
                $country->timestamps = false;
                $country->is_active = 1;
            }
            $country->save();
        }
        return back();
    }
}
