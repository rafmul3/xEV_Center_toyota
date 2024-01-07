<?php

namespace App\Http\Controllers;

use App\Models\reservation_session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storereservation_sessionRequest;
use App\Http\Requests\Updatereservation_sessionRequest;

class ReservationSessionController extends Controller
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
     * @param  \App\Http\Requests\Storereservation_sessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storereservation_sessionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reservation_session  $reservation_session
     * @return \Illuminate\Http\Response
     */
    public function show(reservation_session $reservation_session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservation_session  $reservation_session
     * @return \Illuminate\Http\Response
     */
    public function edit(reservation_session $reservation_session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatereservation_sessionRequest  $request
     * @param  \App\Models\reservation_session  $reservation_session
     * @return \Illuminate\Http\Response
     */
    public function update(Updatereservation_sessionRequest $request, reservation_session $reservation_session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservation_session  $reservation_session
     * @return \Illuminate\Http\Response
     */
    public function destroy(reservation_session $reservation_session)
    {
        //
    }
}
