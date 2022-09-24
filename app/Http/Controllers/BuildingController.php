<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BuildingController extends Controller
{
    /**
     * Display all buildings
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function index()
    {
        return view('buildings.index', [
            'buildings' => Building::all()->sortBy([
                ['status', 'desc'],
                ['building_number', 'asc'],
            ])
        ]);
    }

    /**
     * Add a new building
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function create()
    {
        return view('buildings.create');
    }


    /**
     * tore a new building
     *
     * @param Request $request
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function store(Request $request)
    {
        $attributes = $this->validateBuilding($request);

        Building::create($attributes);

        return redirect('buildings')->with('success', 'New building added!');
    }

    /**
     * Show the details for an individual building
     *
     * @param Building $building
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function show(Building $building): View|Factory
    {
        return view('buildings.show', ['building' => $building]);
    }

    /**
     * Edit a building's details
     *
     * @param Building $building
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function edit(Building $building): View|Factory
    {
        return view('buildings.edit', ['building' => $building]);
    }

    /**
     * Update an existing building with new data
     *
     * @param Building $building
     * @param Request $request
     * @return RedirectResponse
     * @throws MassAssignmentException
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function update(Building $building, Request $request): RedirectResponse
    {
        $attributes = $this->validateBuilding($request, $building);

        $building->update($attributes);

        return redirect()->route('buildings.show', ['building' => $building])->with('success', "Building $building->building_number updated");
    }

    /**
     * Validate basic building data
     *
     * @param Request $request
     * @param null|Building $building
     * @return array
     */
    protected function validateBuilding(Request $request, ?Building $building = null): array
    {
        $attributes = $request->validate([
            'building_number' => ['required', Rule::unique('buildings', 'building_number')->ignore($building?->id)],
            'description' => ['nullable', 'max:500'],
            'address' => ['nullable', 'max:255'],
            'status' => ['required'],
            'floors' => ['required'],
        ]);

        return $attributes;
    }
}
