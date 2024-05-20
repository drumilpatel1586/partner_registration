<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\states;

class StateMaster extends Component
{
    public $states;

    public function render()
    {
        $this->states = States::with('country')->get();
        return view('livewire.state-master',['states' => $this->states]);
    }
}
