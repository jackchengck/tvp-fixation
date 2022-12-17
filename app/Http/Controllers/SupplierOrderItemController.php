<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierOrderItemRequest;
use App\Http\Requests\UpdateSupplierOrderItemRequest;
use App\Models\SupplierOrderItem;

class SupplierOrderItemController extends Controller
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
     * @param  \App\Http\Requests\StoreSupplierOrderItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierOrderItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupplierOrderItem  $supplierOrderItem
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierOrderItem $supplierOrderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplierOrderItem  $supplierOrderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierOrderItem $supplierOrderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupplierOrderItemRequest  $request
     * @param  \App\Models\SupplierOrderItem  $supplierOrderItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierOrderItemRequest $request, SupplierOrderItem $supplierOrderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierOrderItem  $supplierOrderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierOrderItem $supplierOrderItem)
    {
        //
    }
}
