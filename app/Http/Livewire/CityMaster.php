<?php

namespace App\Http\Livewire;

use App\Models\cities;
use Livewire\Component;


class CityMaster extends Component
{
    public $cities;
    public function render()
    {
        // $this->cities = Cities::orderBy('name', 'ASC')->get();
        $this->cities= cities::all();

        return view('livewire.city-master',['cities' => $this->cities]);
    }
}
