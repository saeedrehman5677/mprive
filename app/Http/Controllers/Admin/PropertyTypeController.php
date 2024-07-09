<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPropertyTypeRequest;
use App\Http\Requests\StorePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;
use App\Models\PropertyType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PropertyTypeController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('property_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PropertyType::query()->select(sprintf('%s.*', (new PropertyType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'property_type_show';
                $editGate      = 'property_type_edit';
                $deleteGate    = 'property_type_delete';
                $crudRoutePart = 'property-types';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('status', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->status ? 'checked' : null) . '>';
            });
            $table->editColumn('icon', function ($row) {
                if ($photo = $row->icon) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'status', 'icon']);

            return $table->make(true);
        }

        return view('admin.propertyTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('property_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.propertyTypes.create');
    }

    public function store(StorePropertyTypeRequest $request)
    {
        $propertyType = PropertyType::create($request->all());

        if ($request->input('icon', false)) {
            $propertyType->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $propertyType->id]);
        }

        return redirect()->route('admin.property-types.index');
    }

    public function edit(PropertyType $propertyType)
    {
        abort_if(Gate::denies('property_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.propertyTypes.edit', compact('propertyType'));
    }

    public function update(UpdatePropertyTypeRequest $request, PropertyType $propertyType)
    {
        $propertyType->update($request->all());

        if ($request->input('icon', false)) {
            if (! $propertyType->icon || $request->input('icon') !== $propertyType->icon->file_name) {
                if ($propertyType->icon) {
                    $propertyType->icon->delete();
                }
                $propertyType->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($propertyType->icon) {
            $propertyType->icon->delete();
        }

        return redirect()->route('admin.property-types.index');
    }

    public function show(PropertyType $propertyType)
    {
        abort_if(Gate::denies('property_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $propertyType->load('propertyTypeSales');

        return view('admin.propertyTypes.show', compact('propertyType'));
    }

    public function destroy(PropertyType $propertyType)
    {
        abort_if(Gate::denies('property_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $propertyType->delete();

        return back();
    }

    public function massDestroy(MassDestroyPropertyTypeRequest $request)
    {
        $propertyTypes = PropertyType::find(request('ids'));

        foreach ($propertyTypes as $propertyType) {
            $propertyType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('property_type_create') && Gate::denies('property_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PropertyType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
