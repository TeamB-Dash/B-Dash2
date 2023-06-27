<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Article;
use App\Models\Department;
use App\Models\ArticleFavorites;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\MonthlyReport;
use App\Models\Question;
use App\Models\UserRole;
use Laravel\Sanctum\HasApiTokens;

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

    public function articles(): HasMany
    {
    return $this->hasMany('App\Models\Article');
    // return $this->belongsTo('App\Models\Article');
}
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'followed_user_id', 'user_id');
    }

    public function followeds()
    {
        return $this->belongsToMany(User::class, 'user_follows', 'user_id', 'followed_user_id');
    }

    // 日付フォーマットエラー回避のための定義
    // protected $dates = [
    //     'entry_date',
    // ];

    // monthly_reportsテーブルと紐付け
    public function monthlyReports()
    {
        return $this->hasMany(MonthlyReport::class);
    }

    // Questionへの関連を定義
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Departmentへの関連を定義
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function articleFavorites()
    {
    
        return $this->hasMany(ArticleFavorites::class, 'user_id', 'id');

    }

    // UserRoleへの関連を定義
    public function role()
    {
        return $this->hasOne(UserRole::class);
    }

    // MonthlyReportLikesへの関連を定義
    public function monthlyReportLikes()
    {
        return $this->belongsToMany(MonthlyReport::class, 'monthly_report_likes')->withTimestamps();
    }

    // ArticleLikesへの関連を定義
    public function articleLikes()
    {
        return $this->belongsToMany(Article::class, 'article_likes')->withTimestamps();
    }

}