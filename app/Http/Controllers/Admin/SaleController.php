<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySaleRequest;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Amenity;
use App\Models\Developer;
use App\Models\PropertyType;
use App\Models\Sale;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SaleController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sale::with(['property_types', 'amenities', 'user'])->select(sprintf('%s.*', (new Sale)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sale_show';
                $editGate      = 'sale_edit';
                $deleteGate    = 'sale_delete';
                $crudRoutePart = 'sales';

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
            $table->editColumn('property', function ($row) {
                return $row->property ? $row->property : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('developer', function ($row) {
                return $row->getDeveloper ? $row->getDeveloper?->name : '';
            });
            $table->editColumn('publishing_status', function ($row) {
                return $row->publishing_status ? Sale::PUBLISHING_STATUS_SELECT[$row->publishing_status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.sales.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property_types = PropertyType::pluck('name', 'id');

         $amenities = Amenity::pluck('name', 'id');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $developers = Developer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sales.create', compact('amenities', 'developers', 'property_types', 'users'));
    }

    public function store(StoreSaleRequest $request)
    {
        $sale = Sale::create($request->all());
        $sale->property_types()->sync($request->input('property_types', []));
        $sale->amenities()->sync($request->input('amenities', []));
        if ($request->input('featured_image', false)) {
            $sale->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        foreach ($request->input('gallery_images', []) as $file) {
            $sale->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery_images');
        }

        foreach ($request->input('files', []) as $file) {
            $sale->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $sale->id]);
        }

        return redirect()->route('admin.sales.index');
    }

    public function edit(Sale $sale)
    {
        abort_if(Gate::denies('sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $property_types = PropertyType::pluck('name', 'id');

        $amenities = Amenity::pluck('name', 'id');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $developers = Developer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sale->load('property_types', 'amenities', 'user');

        return view('admin.sales.edit', compact('amenities' ,'developers', 'property_types', 'sale', 'users'));
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->all());
        $sale->property_types()->sync($request->input('property_types', []));
        $sale->amenities()->sync($request->input('amenities', []));
        if ($request->input('featured_image', false)) {
            if (! $sale->featured_image || $request->input('featured_image') !== $sale->featured_image->file_name) {
                if ($sale->featured_image) {
                    $sale->featured_image->delete();
                }
                $sale->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($sale->featured_image) {
            $sale->featured_image->delete();
        }

        if (count($sale->gallery_images) > 0) {
            foreach ($sale->gallery_images as $media) {
                if (! in_array($media->file_name, $request->input('gallery_images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $sale->gallery_images->pluck('file_name')->toArray();
        foreach ($request->input('gallery_images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $sale->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('gallery_images');
            }
        }

        if (count($sale->files) > 0) {
            foreach ($sale->files as $media) {
                if (! in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $sale->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $sale->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.sales.index');
    }

    public function show(Sale $sale)
    {
        abort_if(Gate::denies('sale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sale->load('property_types', 'amenities', 'user', 'propertyContacts', 'propertyViewings');

        return view('admin.sales.show', compact('sale'));
    }

    public function destroy(Sale $sale)
    {
        abort_if(Gate::denies('sale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sale->delete();

        return back();
    }

    public function massDestroy(MassDestroySaleRequest $request)
    {
        $sales = Sale::find(request('ids'));

        foreach ($sales as $sale) {
            $sale->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('sale_create') && Gate::denies('sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Sale();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
