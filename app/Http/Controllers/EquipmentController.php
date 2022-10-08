<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Equipment;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function index(): View|Factory
    {
        return view('equipment.index', [
            'equipment' => Equipment::with('building')->get()->sortBy([
                ['building.building_number', 'asc'],
                ['floor', 'asc'],
                ['room_number', 'asc'],
                ['type', 'asc'],
            ])
        ]);
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
     * @param Equipment $equipment
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function show(Equipment $equipment): View|Factory
    {
        return view('equipment.show', ['equipment' => $equipment]);
    }

    /**
     * Show the form for editing equipment
     *
     * @param Equipment $equipment
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function edit(Equipment $equipment): View|Factory
    {
        return view('equipment.form', [
            'heading' => "Edit Equipment: $equipment->name",
            'equipment' => $equipment,
            'buildings' => Building::all(),
            'route' => route('equipment.update', ['equipment' => $equipment])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }
}
