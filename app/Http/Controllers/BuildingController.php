<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class BuildingController extends Controller
{
    /**
     * Display all buildings
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function index(): View|Factory
    {
        return view('buildings.index', [
            'buildings' => Building::all()->sortBy([
                ['status', 'desc'],
                ['building_number', 'asc'],
            ])
        ]);
    }

    /**
     * Render a view, allowing to user to provide data for a new building via a form
     *
     * @return View|Factory
     * @throws BindingResolutionException
     */
    public function create()
    {
        return view('buildings.create');
    }

    /**
     * Creates a new building with validated data from the request
     *
     * @param Request $request
     * @return Redirector
     * @throws BindingResolutionException
     */
    public function store(Request $request): Redirector
    {
        $attributes = $this->validateBuildingData($request);

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
     * Render a view with a form for editing a building's details
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
        $attributes = $this->validateBuildingData($request, $building);

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
    protected function validateBuildingData(Request $request, ?Building $building = null): array
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
