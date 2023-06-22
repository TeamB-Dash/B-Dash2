<?php

namespace App\Models;

use App\Models\MonthlyReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Question;
use App\Models\Article;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    // Tagへの関連を定義
    public function tags(){
        return $this->belongsToMany(MonthlyReport::class,'monthly_report_tags');
    }

    // Questionへの関連を定義
    public function questions(){
        return $this->belongsToMany(Question::class,'question_tags')->where('is_deleted','=',false)->withTimestamps();
    }

    // MonthlyReportへの関連を定義
    public function monthlyReports(){
        return $this->belongsToMany(MonthlyReport::class,'monthly_report_tags')->withTimestamps();
    }

    // Articleへの関連を定義
    public function articles(){
        return $this->belongsToMany(Article::class,'article_tags')->withTimestamps();
    }

    // ArticleTagsへの関連を定義
    public function articleTags(){
        return $this->belongsToMany(Article::class,'article_tags')->withTimestamps();
    }
}
