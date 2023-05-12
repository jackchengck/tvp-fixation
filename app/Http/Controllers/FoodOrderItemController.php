<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodOrderItemRequest;
use App\Http\Requests\UpdateFoodOrderItemRequest;
use App\Models\FoodOrderItem;

class FoodOrderItemController extends Controller
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
     * @param  \App\Http\Requests\StoreFoodOrderItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFoodOrderItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodOrderItem  $foodOrderItem
     * @return \Illuminate\Http\Response
     */
    public function show(FoodOrderItem $foodOrderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodOrderItem  $foodOrderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodOrderItem $foodOrderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFoodOrderItemRequest  $request
     * @param  \App\Models\FoodOrderItem  $foodOrderItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodOrderItemRequest $request, FoodOrderItem $foodOrderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodOrderItem  $foodOrderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodOrderItem $foodOrderItem)
    {
        //
    }
}
