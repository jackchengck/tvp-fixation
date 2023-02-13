<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstantMessageImageRequest;
use App\Http\Requests\UpdateInstantMessageImageRequest;
use App\Models\InstantMessageImage;

class InstantMessageImageController extends Controller
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
     * @param  \App\Http\Requests\StoreInstantMessageImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstantMessageImageRequest $request)
    {
        //
        $disk = config('backpack.base.root_disk_name');
        $destination_path = 'public/uploads/articles';


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstantMessageImage  $instantMessageImage
     * @return \Illuminate\Http\Response
     */
    public function show(InstantMessageImage $instantMessageImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstantMessageImage  $instantMessageImage
     * @return \Illuminate\Http\Response
     */
    public function edit(InstantMessageImage $instantMessageImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstantMessageImageRequest  $request
     * @param  \App\Models\InstantMessageImage  $instantMessageImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstantMessageImageRequest $request, InstantMessageImage $instantMessageImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstantMessageImage  $instantMessageImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstantMessageImage $instantMessageImage)
    {
        //
    }
}
