<?php

namespace App\Models;

<<<<<<< HEAD
use App\Models\MonthlyReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
>>>>>>> develop

class Tag extends Model
{
    use HasFactory;

<<<<<<< HEAD
    // Tagへの関連を定義
    public function tags(){
        return $this->belongsToMany(MonthlyReport::class,'monthly_report_tags');
=======
    protected $fillable = [
        'name'
    ];

    // Questionへの関連を定義
    public function questions(){
        return $this->belongsToMany(Question::class,'question_tags')->where('is_deleted','=',false)->withTimestamps();
>>>>>>> develop
    }
}
