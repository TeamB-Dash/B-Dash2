<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // Questionへの関連を定義
    public function questions(){
        return $this->belongsToMany(Question::class,'question_tags')->where('is_deleted','=',false)->withTimestamps();
    }
}
