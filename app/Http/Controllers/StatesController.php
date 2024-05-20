<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\States;

class StatesController extends Controller
{
    public function StateManage($stateId)
    {
        $state = States::find($stateId);

        if ($state) {
            if ($state->is_active) {
                $state->timestamps = false;
                $state->is_active = 0;
            } else {
                $state->timestamps = false;
                $state->is_active = 1;
            }
            $state->save();
        }
        return back();
    }
}
