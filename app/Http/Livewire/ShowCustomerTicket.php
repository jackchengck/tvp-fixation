<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class ShowCustomerTicket extends Component
{
    public $business;
    public $serviceSelected;
    public $customer_email;
    public $customer_password;
    public $result;
    public $bookings;

    public function mount($business)
    {
        $this->business = $business;
        $this->result = $business->lang == 'zh' ? "請先輸入預約電郵及密碼" : "Please Input Email & Password first";
    }

    public function render()
    {
        return view('livewire.show-customer-ticket');
    }

    public function search()
    {
        if ($this->customer_email != '' && $this->customer_password != '') {
            $this->bookings = Booking::where('business_id', '=', $this->business->id)->where('customer_email', '=', $this->customer_email)->where('customer_password', '=', $this->customer_password)->get();
            $this->result = $this->business->lang == 'zh' ? "結果" : "Search Result";
//            dd($this->customer_email, $this->customer_password,$this->bookings);
        } else {
            $this->result = $this->business->lang == 'zh' ? "請先輸入預約電郵及密碼" : "Please Input Email & Password first";

        }
    }

    public function test()
    {
        $this->result = "Test Now";
//        dd($this->result);
    }

}
