<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index()
    {
        // Fetch all job applications
        $applications = JobApplication::all();

        return view('admin.job-applications.index', compact('applications'));
    }

    public function show($id)
    {
        // Fetch a single job application by ID
        $application = JobApplication::findOrFail($id);

        return view('admin.job-applications.show', compact('application'));
    }
}
