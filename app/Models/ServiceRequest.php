<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'service_id',
        'message',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
