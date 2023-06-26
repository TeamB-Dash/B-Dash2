<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MonthlyReport extends Model
{
    use HasFactory;
    
    // userへの関連を定義
    public function user() {
        return $this->belongsTo(User::class);
    }

    // tagへの関連を定義
    public function tags() {
        return $this->belongsToMany(Tag::class, 'monthly_report_tags');
    }

    // monthly_working_processへの関連を定義
    public function monthlyWorkingProcesses() {
        return $this->hasOne(MonthlyWorkingProcess::class);
    }

    // 日付フォーマットエラー回避のための定義
    protected $dates = [
        'shipped_at',
        'target_month',
        'entry_date',
    ];

    protected $fillable = [
        'target_month',
        'assign',
        'project_summary',
        'business_content',
        'looking_back',
        'next_month_goals',
        'user_id',
        'is_deleted',
        'shipped_at',
    ];

}
