<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ArticleComments;
use App\Models\ArticleFavorites;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'article_category_id',
        'comments_count',
        'is_deleted',
        'shipped_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function articleComments(): HasMany
    {
        return $this->hasMany('App\Models\ArticleComments');
    }

    public function articleFavorites(): HasMany
    {
        return $this->hasMany('App\Models\ArticleFavorites');
        // return $this->belongsToMany('App\Models\ArticleFavorites');
        // return $this->belongsToMany('App\Models\User', 'articleFavorites')->withTimestamps();
    }

    // public function isFavoritedBy(?User $user): bool
    // {
    //     return $user
    //         ? (bool)$this->likes->where('id', $user->id)->count()
    //         : false;
    // }

    // public function articleFavorites(): HasMany
    // {
    //     return $this->belongsToMany('App\Models\ArticleFavorites');
    // }
}
