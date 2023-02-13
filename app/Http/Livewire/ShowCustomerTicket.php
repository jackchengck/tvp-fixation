<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\Coupon;
use Livewire\Component;

class ShowCustomerTicket extends Component
{
    public $business;
    public $serviceSelected;
    public $customer_email;
    public $customer_password;
    public $bookings;
    public $result;
    public $bookingTitle;
    public $couponTitle;
    public $coupons;

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
            $this->bookingTitle = $this->business->lang == 'zh' ? "預約" : "Bookings";
            $this->couponTitle = $this->business->lang == 'zh' ? "優惠卷" : "Coupons";
            $this->coupons = Coupon::where('business_id', '=', $this->business->id)->get();
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
