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

    // 日付フォーマットエラー回避のための定義
    protected $dates = [
        'shipped_at',
        'target_month',
        'entry_date',
    ];

}
