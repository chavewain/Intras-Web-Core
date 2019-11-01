<?php

namespace App\Http\Controllers\Expert;

use App\Expert;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class ExpertController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Expert::all();
        return $this->showAll($items);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expert\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function show(Expert $expert)
    {
        return $this->showOne($expert);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expert\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function edit(Expert $expert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expert\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expert $expert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expert\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expert $expert)
    {
        //
    }
}
