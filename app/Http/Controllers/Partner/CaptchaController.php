<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function reloadCaptcha(){
        return response()->json(['captcha'=>captcha_img('math')]);
    }
}
