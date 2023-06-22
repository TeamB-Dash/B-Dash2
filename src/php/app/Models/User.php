<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Question;
use App\Models\Department;
use App\Models\Article;
use App\Models\MonthlyReport;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
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

    // Questionへの関連を定義
    public function questions(){
        return $this->hasMany(Question::class);
    }

    // Departmentへの関連を定義
    public function department(){
        return $this->belongsTo(Department::class);
    }

    // Articlesへの関連を定義
    public function articles(){
        return $this->hasMany(Article::class);
    }

    // MonthlyReportsへの関連を定義
    public function monthlyReports(){
        return $this->hasMany(MonthlyReport::class);
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
