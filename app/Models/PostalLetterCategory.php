<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostalLetterCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_published',
    ];
}
