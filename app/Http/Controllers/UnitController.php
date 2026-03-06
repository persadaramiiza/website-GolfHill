<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $units = Unit::with(['unitType', 'contactPerson', 'media'])
            ->latest()
            ->paginate(12);

        return view('units.index', compact('units'));
    }

    public function show($slug)
    {
        $unit = Unit::with(['unitType', 'contactPerson', 'media'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('units.show', compact('unit'));
    }
}
