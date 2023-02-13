<?php

namespace App\Http\Livewire;

use App\Models\FAQ;
use Livewire\Component;

class ShowFrequentlyAnsweredQuestions extends Component
{

    public $keyword;
    public $faqs;

    public function mount($business)
    {
        $this->business = $business;
        $this->faqs = FAQ::where('business_id', $business->id)->get();
    }

    public function render()
    {
        return view('livewire.show-frequently-answered-questions');
    }

    public function search()
    {
        if ($this->keyword != '') {
            $this->faqs = FAQ::where('business_id', $this->business->id)->where('question', 'like', '%' . $this->keyword . '%')->orWhere('answer', 'like', '%' . $this->keyword . '%')->get();
        }else{
            $this->faqs = FAQ::where('business_id', $this->business->id)->get();
        }
    }
}
