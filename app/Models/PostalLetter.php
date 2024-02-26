<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostalLetter extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'category_id',
        'is_published',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostalLetterCategory::class);
    }
}
