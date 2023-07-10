<?php

    namespace App\Http\Livewire;

    use App\Models\Booking;
    use App\Models\Coupon;
    use App\Models\Customer;
    use Carbon\Carbon;
    use Livewire\Component;

    class ShowCustomerTicket extends Component
    {
        public $business;
        public $serviceSelected;
        public $customer_email;
        public $customer_password;
        public $customer_name;
        public $bookings;
        public $result;
        public $bookingTitle;
        public $couponTitle;
        public $coupons;
        public $expiry_date;

        public $customer;

        public function mount($business)
        {
            $this->business = $business;
            $this->result = $business->lang == 'zh' ? "請先輸入電郵及密碼" : "Please Input Email & Password first";
        }

        public function render()
        {
            return view('livewire.show-customer-ticket');
        }

        public function search()
        {
            $this->bookings = null;

            if ($this->customer_email != '' && $this->customer_password != '') {

                $this->customer = Customer::where('business_id', '=', $this->business->id)->where('email', '=', $this->customer_email)->where('password', '=', $this->customer_password)->first();

//                dd($this->customer);
                if (!$this->customer) {
                    $this->customer = Customer::where('business_id', '=', $this->business->id)->where('email', '=', $this->customer_email)->where('password', '=', null)->first();
                }

                if ($this->customer) {
                    $this->customer_name = $this->customer->name;
                    $lastDatetime = new Carbon($this->customer->bookings->last()->created_at ?? now());
                    $this->expiry_date = $lastDatetime->addYears(2)->toDateString();
                    $this->bookings = $this->customer->bookings;
                    $this->result = $this->business->lang == 'zh' ? "結果" : "Search Result";
                    $this->coupons = Coupon::where('business_id', '=', $this->business->id)->get();


                } else {
                    $this->result = $this->business->lang == 'zh' ? "登入失敗" : "Login Failed";
                    $this->coupons = null;

                }

//                $this->bookings = Booking::where('business_id', '=', $this->business->id)->where('customer_email', '=', $this->customer_email)->where('customer_password', '=', $this->customer_password)->get();
//                if ($this->bookings) {
//                    $this->customer_name = $this->bookings[0]->customer_name ?? "";
//                    $lastDatetime = new Carbon($this->bookings->last()->created_at ?? now());
//                    $this->expiry_date = $lastDatetime->addYears(2)->toDateString();
//                }

//                $this->result = $this->business->lang == 'zh' ? "結果" : "Search Result";

                $this->bookingTitle = $this->business->lang == 'zh' ? "預約" : "Bookings";
                $this->couponTitle = $this->business->lang == 'zh' ? "優惠卷" : "Coupons";

            } else {
                $this->result = $this->business->lang == 'zh' ? "請先輸入電郵及密碼" : "Please Input Email & Password first";
            }
        }

        public function test()
        {
            $this->result = "Test Now";
//        dd($this->result);
        }

    }
