<?php

namespace App\Models;

use App\Models\MonthlyReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MonthlyWorkingProcess extends Model
{
    use HasFactory;

    // monthly_reportsテーブルとの関連付け
    public function monthlyReports() {
        return $this->belongsTo(MonthlyReport::class);
    }
}
