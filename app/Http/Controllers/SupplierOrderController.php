<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierOrderRequest;
use App\Http\Requests\UpdateSupplierOrderRequest;
use App\Models\SupplierOrder;

class SupplierOrderController extends Controller
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
     * @param  \App\Http\Requests\StoreSupplierOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierOrderRequest $request)
    {
        //
//        dd($request->supplier_order_id);
//        $order = Order::findOrFail($request->order_id);
//
//        // Ship the order...
//
//        Mail::to($request->user())->send(new OrderShipped($order));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupplierOrder  $supplierOrder
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierOrder $supplierOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplierOrder  $supplierOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierOrder $supplierOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupplierOrderRequest  $request
     * @param  \App\Models\SupplierOrder  $supplierOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplierOrderRequest $request, SupplierOrder $supplierOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierOrder  $supplierOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierOrder $supplierOrder)
    {
        //
    }
}
