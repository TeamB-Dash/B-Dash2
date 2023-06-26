<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ArticleComments;
use App\Models\ArticleFavorites;
use App\Models\Tag;
use App\Models\User;


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
    }

    public function isFavoritedByUser($user)
    {
        return $this->articleFavorites()
                    ->where('user_id', $user->id)
                    ->where('is_deleted', false)
                    ->exists();
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'article_tags')->where('is_deleted','=',false)->withTimestamps();
    }

}
