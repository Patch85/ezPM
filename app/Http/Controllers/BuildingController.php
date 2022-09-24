<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

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

    //
}
