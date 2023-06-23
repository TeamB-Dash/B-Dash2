<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Article;
use App\Models\Department;
use App\Models\MonthlyReport;
use App\Models\Question;
use App\Models\UserRole;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    // 日付フォーマットエラー回避のための定義
    protected $dates = [
        'entry_date',
    ];

    // monthly_reportsテーブルと紐付け
    public function monthlyReports() {
        return $this->hasMany(MonthlyReport::class);
    }

    // departmentsテーブルと紐付け
    public function articles(): HasMany
    {
        return $this->hasMany('App\Models\Article');
    }

    // Questionへの関連を定義
    public function questions(){
        return $this->hasMany(Question::class);
    }

    // Departmentへの関連を定義
    public function department(){
        return $this->belongsTo(Department::class);
    }

    // UserRoleへの関連を定義
    public function role(){
        return $this->hasOne(UserRole::class);
    }

    // MonthlyReportLikesへの関連を定義
    public function monthlyReportLikes(){
        return $this->belongsToMany(MonthlyReport::class,'monthly_report_likes')->withTimestamps();
    }

    // ArticleLikesへの関連を定義
    public function articleLikes(){
        return $this->belongsToMany(Article::class,'article_likes')->withTimestamps();
    }
}
