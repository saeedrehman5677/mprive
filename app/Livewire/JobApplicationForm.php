<?php

namespace App\Livewire;

use App\Models\JobApplication;
use Livewire\Component;
use Livewire\WithFileUploads;

class JobApplicationForm extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $cv;
    public $job_opening_id;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'cv' => 'required|mimes:pdf,doc,docx|max:10240', // max size 10MB
    ];

    public function submit()
    {
        $this->validate();

        // Store the uploaded CV and get the path
        $cvPath = $this->cv->store('public/cvs');

        JobApplication::create([
            'name' => $this->name,
            'email' => $this->email,
            'cv' => $cvPath,
            'job_opening_id' => $this->job_opening_id,
        ]);

        session()->flash('message', 'Your application has been submitted.');

        // Reset form fields
        $this->reset(['name', 'email', 'cv']);
    }

    public function render()
    {
        return view('livewire.job-application-form');
    }
}
