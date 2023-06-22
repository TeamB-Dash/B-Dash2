<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class MonthlyReport extends Model
{
    use HasFactory;

    // 日付フォーマットエラー回避のための定義
    protected $dates = [
        'shipped_at',
        'target_month',
        'entry_date',
    ];

    // MonthlyReportLikesへの関連を定義
    public function monthlyReportLikes(){
        return $this->belongsToMany(User::class,'monthly_report_likes')->withTimestamps();
    }

    // Tagへの関連を定義
    public function tags(){
        return $this->belongsToMany(Tag::class,'monthly_report_tags')->withTimestamps();
    }

    // userへの関連を定義
    public function user() {
        return $this->belongsTo(User::class);
    }

    // monthly_working_processへの関連を定義
    public function monthlyWorkingProcesses() {
        return $this->hasOne(MonthlyWorkingProcess::class);
    }


}
