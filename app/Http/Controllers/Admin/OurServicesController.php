<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOurServiceRequest;
use App\Http\Requests\StoreOurServiceRequest;
use App\Http\Requests\UpdateOurServiceRequest;
use App\Models\OurService;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class OurServicesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('our_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ourServices = OurService::with(['media'])->get();

        return view('admin.ourServices.index', compact('ourServices'));
    }

    public function create()
    {
        abort_if(Gate::denies('our_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ourServices.create');
    }

    public function store(StoreOurServiceRequest $request)
    {
        $ourService = OurService::create($request->all());

        if ($request->input('icon', false)) {
            $ourService->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ourService->id]);
        }

        return redirect()->route('admin.our-services.index');
    }

    public function edit(OurService $ourService)
    {
        abort_if(Gate::denies('our_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ourServices.edit', compact('ourService'));
    }

    public function update(UpdateOurServiceRequest $request, OurService $ourService)
    {
        $ourService->update($request->all());

        if ($request->input('icon', false)) {
            if (! $ourService->icon || $request->input('icon') !== $ourService->icon->file_name) {
                if ($ourService->icon) {
                    $ourService->icon->delete();
                }
                $ourService->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($ourService->icon) {
            $ourService->icon->delete();
        }

        return redirect()->route('admin.our-services.index');
    }

    public function show(OurService $ourService)
    {
        abort_if(Gate::denies('our_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ourServices.show', compact('ourService'));
    }

    public function destroy(OurService $ourService)
    {
        abort_if(Gate::denies('our_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ourService->delete();

        return back();
    }

    public function massDestroy(MassDestroyOurServiceRequest $request)
    {
        $ourServices = OurService::find(request('ids'));

        foreach ($ourServices as $ourService) {
            $ourService->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('our_service_create') && Gate::denies('our_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new OurService();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
