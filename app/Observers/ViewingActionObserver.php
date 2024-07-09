<?php

namespace App\Observers;

use App\Models\Viewing;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ViewingActionObserver
{
    public function created(Viewing $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Viewing'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        //Notification::send($users, new DataChangeEmailNotification($data));
    }
}
