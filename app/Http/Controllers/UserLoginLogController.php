<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserLoginLogRequest;
use App\Http\Requests\UpdateUserLoginLogRequest;
use App\Models\UserLoginLog;

class UserLoginLogController extends Controller
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
     * @param  \App\Http\Requests\StoreUserLoginLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserLoginLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserLoginLog  $userLoginLog
     * @return \Illuminate\Http\Response
     */
    public function show(UserLoginLog $userLoginLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserLoginLog  $userLoginLog
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLoginLog $userLoginLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserLoginLogRequest  $request
     * @param  \App\Models\UserLoginLog  $userLoginLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserLoginLogRequest $request, UserLoginLog $userLoginLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserLoginLog  $userLoginLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLoginLog $userLoginLog)
    {
        //
    }
}
