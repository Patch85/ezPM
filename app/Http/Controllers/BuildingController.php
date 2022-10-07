<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use LogicException;
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
    public function create(): View|Factory
    {
        return view('buildings.form', [
            'heading' => 'Add a New Building',
            'building' => new Building,
            'route' => route('buildings.store'),
        ]);
    }

    /**
     * Creates a new building with validated data from the request
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $this->validateBuildingData($request);

        $building = Building::create($attributes);

        return redirect()->route('buildings.show', ['building' => $building])->with('success', "Building $building->building_number added");
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
        return view('buildings.form', [
            'heading' => "Edit Building $building->building_number",
            'building' => $building,
            'route' => route('buildings.update', ['building' => $building])
        ]);
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
     * Delete an existing building
     *
     * @param Building $building
     * @return RedirectResponse
     * @throws LogicException
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function destroy(Building $building): RedirectResponse
    {
        $buildingNumber = $building->building_number;
        $building->delete();

        return redirect()->route('buildings.index')->with('success', "Building $buildingNumber deleted");
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
        $building ??= new Building();

        $attributes = $request->validate([
            'building_number' => ['required', Rule::unique('buildings', 'building_number')->ignore($building?->id)],
            'description' => ['nullable', 'max:500'],
            'address' => ['nullable', 'max:255'],
            'status' => ['required'],
            'floors' => ['required'],
        ]);

        $attributes['slug'] = Str::slug($attributes['building_number']);

        return $attributes;
    }
}
