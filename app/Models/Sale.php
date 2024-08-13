<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Sale extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'sales';

    public static $searchable = [
        'property',
        'title',
    ];

    protected $appends = [
        'featured_image',
        'gallery_images',
        'files',
    ];

    protected $dates = [
        'year_built',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PUBLISHING_STATUS_SELECT = [
        'active'    => 'active',
        'in active' => 'in active',
    ];

    public const PROPERTY_STATUS_SELECT = [
        'For rent'    => 'For rent',
        'For Sale'    => 'For Sale',
        'New Project' => 'New Project',
    ];

    public const EMIRATES_SELECT = [
        'Dubai'          => 'Dubai',
        'Abu Dhabi'      => 'Abu Dhabi',
        'Ras Al Khaimah' => 'Ras Al Khaimah',

    ];

    protected $fillable = [
        'property',
        'title',
        'sub_title',
        'slug',
        'emirates',
        'location',
        'size',
        'price',
        'discounted_price',
        'bathrooms',
        'bed_rooms',
        'year_built',
        'developer',
        'property_status',
        'description',
        'publishing_status',
        'nearby',
        'user_id',
        'featured',
        'top_properties',
        'meta_title',
        'meta_content',
        'meta_description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        self::observe(new \App\Observers\SaleActionObserver);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 200, 200);
    }

    public function propertyContacts()
    {
        return $this->hasMany(Contact::class, 'property_id', 'id');
    }

    public function propertyViewings()
    {
        return $this->hasMany(Viewing::class, 'property_id', 'id');
    }

    public function getYearBuiltAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setYearBuiltAttribute($value)
    {
        $this->attributes['year_built'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFeaturedImageAttribute()
    {
        $file = $this->getMedia('featured_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }
    public function getThumbAttribute()
    {
        $file = $this->getMedia('featured_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file?->preview;
    }

    public function getGalleryImagesAttribute()
    {
        $files = $this->getMedia('gallery_images');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }

    public function getFilesAttribute()
    {
        $files =  $this->getMedia('files');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });
        return $files;
    }

    public function property_types()
    {
        return $this->belongsToMany(PropertyType::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDeveloper()
    {
        return $this->belongsTo(Developer::class, 'developer');
    }
    public function subProperty()
    {
        return $this->belongsToMany(Subtype::class);
    }
}
