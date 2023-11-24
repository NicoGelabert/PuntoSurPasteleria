<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergens extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon'];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'products_alergens', 'alergens_id','products_id');
    }

}
