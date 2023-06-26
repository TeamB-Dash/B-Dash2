<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Question;
use App\Models\Department;
use App\Models\ArticleFavorites;
use App\Models\Article;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles(): BelongsTo
    {
    // return $this->hasMany('App\Models\Article');
    return $this->belongsTo('App\Models\Article');
}
    // Questionへの関連を定義
    public function questions(){
        return $this->hasMany(Question::class);
    }

    // Departmentへの関連を定義
    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function articleFavorites()
    {
        // return $this->belongsToMany('App\Models\User', 'articleFavorites')->withTimestamps();  
        // return $this->hasMany(ArticleFavorites::class); 
        // return $this->belongsToMany(Article::class, 'article_favorites', 'user_id', 'article_id');
        return $this->hasMany(ArticleFavorites::class, 'user_id', 'id');

    }
}
