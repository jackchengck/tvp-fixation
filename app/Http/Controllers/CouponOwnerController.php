<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCouponOwnerRequest;
use App\Http\Requests\UpdateCouponOwnerRequest;
use App\Models\CouponOwner;

class CouponOwnerController extends Controller
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
     * @param  \App\Http\Requests\StoreCouponOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponOwnerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CouponOwner  $couponOwner
     * @return \Illuminate\Http\Response
     */
    public function show(CouponOwner $couponOwner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CouponOwner  $couponOwner
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponOwner $couponOwner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCouponOwnerRequest  $request
     * @param  \App\Models\CouponOwner  $couponOwner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponOwnerRequest $request, CouponOwner $couponOwner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponOwner  $couponOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponOwner $couponOwner)
    {
        //
    }
}
