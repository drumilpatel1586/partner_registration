<?php

namespace App\Http\Livewire;

use App\Models\countries;
use Livewire\Component;

class CountriesMaster extends Component
{
    public $countries;
    public function render()
    {
        $this->countries = countries::all();
        return view('livewire.countries-master', [
            'countries' => $this->countries
        ]);
    }
}
