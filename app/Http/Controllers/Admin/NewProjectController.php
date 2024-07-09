<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNewProjectRequest;
use App\Http\Requests\StoreNewProjectRequest;
use App\Http\Requests\UpdateNewProjectRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewProjectController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('new_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newProjects.index');
    }

    public function create()
    {
        abort_if(Gate::denies('new_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newProjects.create');
    }

    public function store(StoreNewProjectRequest $request)
    {
        $newProject = NewProject::create($request->all());

        return redirect()->route('admin.new-projects.index');
    }

    public function edit(NewProject $newProject)
    {
        abort_if(Gate::denies('new_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newProjects.edit', compact('newProject'));
    }

    public function update(UpdateNewProjectRequest $request, NewProject $newProject)
    {
        $newProject->update($request->all());

        return redirect()->route('admin.new-projects.index');
    }

    public function show(NewProject $newProject)
    {
        abort_if(Gate::denies('new_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newProjects.show', compact('newProject'));
    }

    public function destroy(NewProject $newProject)
    {
        abort_if(Gate::denies('new_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newProject->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewProjectRequest $request)
    {
        $newProjects = NewProject::find(request('ids'));

        foreach ($newProjects as $newProject) {
            $newProject->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
