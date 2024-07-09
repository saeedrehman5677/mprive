<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDeveloperRequest;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use App\Models\Developer;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DeveloperController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('developer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $developers = Developer::with(['media'])->get();

        return view('admin.developers.index', compact('developers'));
    }

    public function create()
    {
        abort_if(Gate::denies('developer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.developers.create');
    }

    public function store(StoreDeveloperRequest $request)
    {

        $developer = Developer::create($request->all());

        if ($request->input('image', false)) {
            $developer->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $developer->id]);
        }

        return redirect()->route('admin.developers.index');
    }

    public function edit(Developer $developer)
    {
        abort_if(Gate::denies('developer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.developers.edit', compact('developer'));
    }

    public function update(UpdateDeveloperRequest $request, Developer $developer)
    {
        $developer->update($request->all());

        if ($request->input('image', false)) {
            if (! $developer->image || $request->input('image') !== $developer->image->file_name) {
                if ($developer->image) {
                    $developer->image->delete();
                }
                $developer->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($developer->image) {
            $developer->image->delete();
        }

        return redirect()->route('admin.developers.index');
    }

    public function show(Developer $developer)
    {
        abort_if(Gate::denies('developer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.developers.show', compact('developer'));
    }

    public function destroy(Developer $developer)
    {
        abort_if(Gate::denies('developer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $developer->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeveloperRequest $request)
    {
        $developers = Developer::find(request('ids'));

        foreach ($developers as $developer) {
            $developer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('developer_create') && Gate::denies('developer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Developer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
