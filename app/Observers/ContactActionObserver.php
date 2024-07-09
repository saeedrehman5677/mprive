<?php

namespace App\Observers;

use App\Models\Contact;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ContactActionObserver
{
    public function created(Contact $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Contact'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
