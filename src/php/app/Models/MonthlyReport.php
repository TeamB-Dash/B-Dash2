<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tag;


class MonthlyReport extends Model
{
    use HasFactory;

    // Userへの関連を定義
    public function user(){
        return $this->belongsTo(User::class);
    }

    // MonthlyReportLikesへの関連を定義
    public function monthlyReportLikes(){
        return $this->belongsToMany(User::class,'monthly_report_likes')->withTimestamps();
    }

    // Tagへの関連を定義
    public function tags(){
        return $this->belongsToMany(Tag::class,'monthly_report_tags')->withTimestamps();
    }
}
