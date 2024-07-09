<?php

namespace App\Observers;

use App\Models\Sale;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class SaleActionObserver
{
    public function created(Sale $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Sale'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
