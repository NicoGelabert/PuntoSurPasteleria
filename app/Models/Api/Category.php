<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends \App\Models\Categories
{
    public function getRouteKeyName()
    {
        return 'id';
    }
}
