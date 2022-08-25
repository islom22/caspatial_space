<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'desc',
        // 'img',
        'serviceCategory_id'
    ];

    protected $casts = [
        'title' => 'array',
        'subtitle' => 'array',
        'desc' => 'array',
    ];

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'serviceCategory_id', "id");
    }


    public function serviceImage()
    {
        return $this->hasMany(ServiceImage::class);
    }
}
