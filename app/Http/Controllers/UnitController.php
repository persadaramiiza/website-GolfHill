<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitType;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $query = Unit::with(['unitType', 'contactPerson']);

        // Filter by type
        if ($request->type) {
            $query->where('unit_type_id', $request->type);
        }

        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Filter by price range
        if ($request->price_min) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->price_max) {
            $query->where('price', '<=', $request->price_max);
        }

        $units = $query->latest()->paginate(12);
        $unitTypes = UnitType::all();

        return view('units.index', compact('units', 'unitTypes'));
    }

    public function show($slug)
    {
        $unit = Unit::with(['unitType', 'contactPerson'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('units.show', compact('unit'));
    }
}
