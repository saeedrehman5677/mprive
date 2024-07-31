<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class JobOpening extends Model
{

    protected $fillable = [
        'title', 'description', 'location', 'type',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}

