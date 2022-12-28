<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowTimeslots extends Component
{
    public $business;
    public $serviceSelected;
    public $bookingDate;

    public function mount($business)
    {
        $this->serviceSelected = $business->services[0]->id;
//        $this->service_selected = 1;
    }

    public function render()
    {
        return view('livewire.show-timeslots');
    }

}
