<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cities;

class CityController extends Controller
{
    public $city;

    public function CityManage($cityId){

        $city = cities::find($cityId);

        if ($city) {
            if ($city->is_active) {
                $city->timestamps = false;
                $city->is_active = 0;
            } else {
                $city->timestamps = false;
                $city->is_active = 1;
            }
            $city->save();
        }
        return back();
            
    }
}
