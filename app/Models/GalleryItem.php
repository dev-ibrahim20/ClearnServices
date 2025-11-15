<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'category',
        'description',
        'done_at',
        'service_id',
    ];

    protected $casts = [
        'done_at' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function (GalleryItem $item) {
            if (empty($item->slug) && !empty($item->title)) {
                $base = Str::slug($item->title);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->where('id', '!=', $item->id)->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $item->slug = $slug;
            }
        });
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
