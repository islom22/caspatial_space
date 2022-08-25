<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $table = 'service_categories';
    protected $fillable = [
        'title'
   ];

   protected $casts = [
        'title'=> 'array'
   ]; 

   public function service(){
    return $this->hasMany(Service::class, 'id', 'service_id');
}
}
