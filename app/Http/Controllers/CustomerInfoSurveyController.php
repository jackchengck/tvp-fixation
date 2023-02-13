<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerInfoSurveyRequest;
use App\Http\Requests\UpdateCustomerInfoSurveyRequest;
use App\Models\CustomerInfoSurvey;

class CustomerInfoSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCustomerInfoSurveyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerInfoSurveyRequest $request)
    {
        //

        $survey = new CustomerInfoSurvey();
        $survey->district = $request->district;
        $survey->occupation = $request->occupation;
        $survey->age_group = $request->age_group;
        $survey->other = $request->other;
        $survey->business_id = $request->business;

        $survey->save();

//        Mail::to($booking->customer_email)->send(new BookingCreatedToCustomer($booking));

        return redirect('survey')->with('status', 'Survey Has been submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CustomerInfoSurvey $customerInfoSurvey
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerInfoSurvey $customerInfoSurvey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CustomerInfoSurvey $customerInfoSurvey
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerInfoSurvey $customerInfoSurvey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCustomerInfoSurveyRequest $request
     * @param \App\Models\CustomerInfoSurvey $customerInfoSurvey
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerInfoSurveyRequest $request, CustomerInfoSurvey $customerInfoSurvey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CustomerInfoSurvey $customerInfoSurvey
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerInfoSurvey $customerInfoSurvey)
    {
        //
    }
}
