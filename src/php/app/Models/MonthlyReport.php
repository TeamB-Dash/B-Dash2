<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MonthlyReport extends Model
{
    use HasFactory;
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    // 日付フォーマットエラー回避のための定義
    protected $dates = [
        'shipped_at',
        'target_month',
        'entry_date',
    ];

}
