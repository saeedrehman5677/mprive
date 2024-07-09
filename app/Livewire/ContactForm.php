<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Viewing;
use Carbon\Carbon;

class ContactForm extends Component
{
    public $fullname;
    public $phone;
    public $viewingDate;
    public $viewingTime;
    public $email;
    public $message;
    public $propertyId = null;

    protected $rules = [
        'fullname' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'viewingDate' => 'nullable|date',
        'viewingTime' => 'nullable|date_format:H:i',
        'email' => 'required|email|max:255',
        'message' => 'nullable|string|max:500',
    ];

    public function mount($propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function submit()
    {
        $this->validate();

        if ($this->propertyId) {
            Viewing::create([
                'name' => $this->fullname,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
                'date' => Carbon::createFromFormat('Y-m-d', $this->viewingDate),
                'time' => $this->viewingTime,
                'property_id' => $this->propertyId, // Replace with the actual property ID if available
            ]);
        }
        else{
            Contact::create([
                'full_name' => $this->fullname,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
            ]);
        }
        $data = [
            'fullname' => $this->fullname,
            'phone' => $this->phone,
            'viewingDate' => $this->viewingDate,
            'viewingTime' => $this->viewingTime,
            'email' => $this->email,
            'messageContent' => $this->message,
        ];
        Mail::send('emails.contact', $data, function ($message) {
            $message->to('qureshi1amer@gmail.com', 'Webiste Mprive')->
            subject( $this->propertyId ?'New Viewing Request': 'New Contact Request');
        });
        session()->flash('message', $this->propertyId? 'Viewing request submitted successfully , Our Team Will get Back shortly':'Contact Request Submited Successfully, Our Team Will get Back shortly.' );

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
