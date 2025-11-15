<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'discount',
        'orders',
        'excerpt',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function (Service $service) {
            if (empty($service->slug) && !empty($service->name)) {
                $base = Str::slug($service->name);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $service->slug = $slug;
            }
        });
    }

    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class);
    }
}
