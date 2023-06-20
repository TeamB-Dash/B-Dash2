<?php

namespace App\Models;

use App\Models\MonthlyReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    // Tagへの関連を定義
    public function tags(){
        return $this->belongsToMany(MonthlyReport::class,'monthly_report_tags');
    }
}
