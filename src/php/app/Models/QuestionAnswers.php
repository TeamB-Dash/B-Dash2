<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class QuestionAnswers extends Model
{
    use HasFactory;


    // Questionへの関連を定義
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
