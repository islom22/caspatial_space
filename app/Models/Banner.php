<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img',
        'desc',
        'link'
   ];

   protected $casts = [
        'title'=> 'array',
        'desc'=> 'array'
   ]; 

}
