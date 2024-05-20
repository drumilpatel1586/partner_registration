<?php

namespace App\Http\Livewire\NSH;

use Livewire\Component;

use App\Models\Partner\Partner;

class PartnerReq extends Component
{
    public $partners;
    public function render()
    {
        $this->partners = Partner::where([
            ['email_verified', '=', 1],
            ['admin_verified', '=', 0]
        ])->get();

        return view('livewire.n-s-h.partner-req', ['partners' => $this->partners]);
    }
}
