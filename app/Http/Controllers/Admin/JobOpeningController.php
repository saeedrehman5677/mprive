<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;
use Illuminate\Http\Request;

class JobOpeningController extends Controller
{
    public function index()
    {
        $jobOpenings = JobOpening::get();
        return view('admin.jobopening.index', compact('jobOpenings'));
    }

    public function create()
    {
        return view('admin.jobopening.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type' => 'required',
        ]);

        JobOpening::create($request->all());
        return redirect()->route('admin.jobopenings.index')->with('success', 'Job Opening created successfully.');
    }

    public function show(JobOpening $jobOpening)
    {
        return view('admin.jobopening.show', compact('jobOpening'));
    }

    public function edit(JobOpening $jobOpening)
    {

        return view('admin.jobopening.edit', compact('jobOpening'));
    }

    public function update(Request $request, JobOpening $jobOpening)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'type' => 'required',
        ]);

        $jobOpening->update($request->all());
        return redirect()->route('admin.jobopenings.index')->with('success', 'Job Opening updated successfully.');
    }

    public function destroy(JobOpening $jobOpening)
    {
        $jobOpening->delete();
        return redirect()->route('admin.jobopenings.index')->with('success', 'Job Opening deleted successfully.');
    }
}
