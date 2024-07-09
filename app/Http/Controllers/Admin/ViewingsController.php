<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyViewingRequest;
use App\Http\Requests\StoreViewingRequest;
use App\Http\Requests\UpdateViewingRequest;
use App\Models\Sale;
use App\Models\Viewing;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ViewingsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('viewing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Viewing::with(['property'])->select(sprintf('%s.*', (new Viewing)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'viewing_show';
                $editGate      = 'viewing_edit';
                $deleteGate    = 'viewing_delete';
                $crudRoutePart = 'viewings';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });

            $table->editColumn('time', function ($row) {
                return $row->time ? $row->time : '';
            });
            $table->addColumn('property_title', function ($row) {
                return $row->property ? $row->property->title : '';
            });

            $table->editColumn('property.location', function ($row) {
                return $row->property ? (is_string($row->property) ? $row->property : $row->property->location) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'property']);

            return $table->make(true);
        }

        return view('admin.viewings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('viewing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $properties = Sale::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.viewings.create', compact('properties'));
    }

    public function store(StoreViewingRequest $request)
    {
        $viewing = Viewing::create($request->all());

        return redirect()->route('admin.viewings.index');
    }

    public function edit(Viewing $viewing)
    {
        abort_if(Gate::denies('viewing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $properties = Sale::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $viewing->load('property');

        return view('admin.viewings.edit', compact('properties', 'viewing'));
    }

    public function update(UpdateViewingRequest $request, Viewing $viewing)
    {
        $viewing->update($request->all());

        return redirect()->route('admin.viewings.index');
    }

    public function show(Viewing $viewing)
    {
        abort_if(Gate::denies('viewing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewing->load('property');

        return view('admin.viewings.show', compact('viewing'));
    }

    public function destroy(Viewing $viewing)
    {
        abort_if(Gate::denies('viewing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $viewing->delete();

        return back();
    }

    public function massDestroy(MassDestroyViewingRequest $request)
    {
        $viewings = Viewing::find(request('ids'));

        foreach ($viewings as $viewing) {
            $viewing->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
