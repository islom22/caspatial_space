<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustrieCategory extends Model
{
    use HasFactory;
    protected $table = 'industrie_categories';
    protected $fillable = [
        'title',
        'subtitle',
        'icon'
   ];

   protected $casts = [
        'title'=> 'array',
        'subtitle'=> 'array'
   ]; 

   public function industri(){
    return $this->hasMany(Industrie::class, 'id', 'industryCategory_id');
}

}
