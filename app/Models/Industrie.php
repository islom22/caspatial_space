<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industrie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img',
        'industryCategory_id',
        'desc'
    ];

    protected $casts = [
        'title' => 'array',
        'desc' => 'array'
    ];

    public function industrieCategory()
    {
        return $this->belongsTo(IndustrieCategory::class, 'industryCategory_id', "id");
    }

}
