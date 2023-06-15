<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;

class Question extends Model
{
    use HasFactory;

    // Userへの関連を定義
    public function user(){
        return $this->belongsTo(User::class);
    }
    // Tagへの関連を定義
    public function tags(){
        return $this->belongsToMany(Tag::class,'question_tags');
    }
}
