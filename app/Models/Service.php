<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['parent_id', 'name', 'description', 'slug', 'image'];
}
