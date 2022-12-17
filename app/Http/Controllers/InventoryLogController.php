<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryLogRequest;
use App\Http\Requests\UpdateInventoryLogRequest;
use App\Models\InventoryLog;

class InventoryLogController extends Controller
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
     * @param  \App\Http\Requests\StoreInventoryLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryLog  $inventoryLog
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryLog $inventoryLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryLog  $inventoryLog
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryLog $inventoryLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryLogRequest  $request
     * @param  \App\Models\InventoryLog  $inventoryLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryLogRequest $request, InventoryLog $inventoryLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryLog  $inventoryLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryLog $inventoryLog)
    {
        //
    }
}
