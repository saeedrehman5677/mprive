<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtype extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_property_id'];

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'parent_property_id');
    }
}
