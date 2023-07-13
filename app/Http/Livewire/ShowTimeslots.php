<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class ShowTimeslots extends Component
{
    public $business;
    public $serviceSelected;
    public $bookingDate;
    public $now;

    public function mount($business)
    {
        $this->serviceSelected = $business->services[0]->id;
//        $this->service_selected = 1;
        $this->now = Carbon::now();
    }

    public function render()
    {
        return view('livewire.show-timeslots');
    }

}
