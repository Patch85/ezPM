<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Equipment;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/** @package App\Http\Controllers */
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
     * Show the form for creating new equipment
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function create(): View|Factory
    {
        return view('equipment.form', [
            'heading' => 'Add New Equipment',
            'equipment' => new Equipment,
            'equipmentTypes' => Equipment::$equipmentTypes,
            'pmStatuses' => Equipment::$pmStatuses,
            'functionalStatuses' => Equipment::$functionalStatuses,
            'buildings' => Building::all()->sortBy(['building.building_number', 'asc'], SORT_NUMERIC),
            'route' => route('equipment.store'),
        ]);
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
            'equipmentTypes' => Equipment::$equipmentTypes,
            'pmStatuses' => Equipment::$pmStatuses,
            'functionalStatuses' => Equipment::$functionalStatuses,
            'buildings' => Building::all(),
            'route' => route('equipment.update', ['equipment' => $equipment])
        ]);
    }

    /**
     * Update the equipment in storage
     *
     * @param Request $request
     * @param Equipment $equipment
     * @return RedirectResponse
     * @throws MassAssignmentException
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function update(Request $request, Equipment $equipment): RedirectResponse
    {
        $attributes = $this->validateEquipmentData($request, $equipment);

        $equipment->update($attributes);

        return redirect()->route('equipment.show', ['equipment' => $equipment])->with('success', "Equipment $equipment->name updated");
    }
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
     * Custom validation rules for basic equipment data
     *
     * @param Request $request
     * @param null|Equipment $equipment
     * @return array
     */
    protected function validateEquipmentData(Request $request, ?Equipment $equipment = null): array
    {
        $equipment ??= new Equipment();

        $validated = $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('equipment', 'name')
                    ->ignore($equipment?->id)
                    ->where('building_id', $equipment?->building?->id)
            ],
            'type' => ['required', Rule::in(Equipment::$equipmentTypes)],
            'description' => ['required', 'max:500'],
            'room_number' => ['sometimes', 'max:10'],
            'floor' => ['sometimes', 'max:3'],
            'functional_status' => ['required', Rule::in(Equipment::$functionalStatuses)],
            'pm_status' => ['required', Rule::in(Equipment::$pmStatuses)],
            'building_id' => ['required', Rule::exists('buildings', 'id')]
        ], $request->only([
            'name',
            'type',
            'description',
            'room_number',
            'floor',
            'functional_status',
            'pm_status',
            'building_id',
        ]));

        $validated['slug'] = Str::slug($validated['name']);

        return $validated;
    }
}
