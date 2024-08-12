<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subtype;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class SubtypeController extends Controller
{
    public function index()
    {
        $subtypes = Subtype::with('propertyType')->get();

        return view('admin.subtypes.index', compact('subtypes'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();

        return view('admin.subtypes.create', compact('propertyTypes'));
    }

    public function store(Request $request)
    {
        Subtype::create($request->all());

        return redirect()->route('admin.subtypes.index');
    }

    public function edit(Subtype $subtype)
    {
        $propertyTypes = PropertyType::all();

        return view('admin.subtypes.edit', compact('subtype', 'propertyTypes'));
    }

    public function update(Request $request, Subtype $subtype)
    {
        $subtype->update($request->all());

        return redirect()->route('admin.subtypes.index');
    }

    public function destroy(Subtype $subtype)
    {
        $subtype->delete();


        return back();
    }



}
