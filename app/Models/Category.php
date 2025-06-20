<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'nama',
        'slug',
    ];
    public function products(){
        return $this->hasMany(Product::class, 'categori_id');
    }
}
