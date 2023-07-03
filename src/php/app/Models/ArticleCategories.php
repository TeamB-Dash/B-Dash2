<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Article;

class ArticleCategories extends Model
{
    use HasFactory;

    public function articles(): BelongsTo
    {
        return $this->belongsTo('App\Models\Article');
    }
}
