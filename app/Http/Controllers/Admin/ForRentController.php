<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyForRentRequest;
use App\Http\Requests\StoreForRentRequest;
use App\Http\Requests\UpdateForRentRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForRentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('for_rent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.forRents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('for_rent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.forRents.create');
    }

    public function store(StoreForRentRequest $request)
    {
        $forRent = ForRent::create($request->all());

        return redirect()->route('admin.for-rents.index');
    }

    public function edit(ForRent $forRent)
    {
        abort_if(Gate::denies('for_rent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.forRents.edit', compact('forRent'));
    }

    public function update(UpdateForRentRequest $request, ForRent $forRent)
    {
        $forRent->update($request->all());

        return redirect()->route('admin.for-rents.index');
    }

    public function show(ForRent $forRent)
    {
        abort_if(Gate::denies('for_rent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.forRents.show', compact('forRent'));
    }

    public function destroy(ForRent $forRent)
    {
        abort_if(Gate::denies('for_rent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $forRent->delete();

        return back();
    }

    public function massDestroy(MassDestroyForRentRequest $request)
    {
        $forRents = ForRent::find(request('ids'));

        foreach ($forRents as $forRent) {
            $forRent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
