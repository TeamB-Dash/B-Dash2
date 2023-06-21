<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Department extends Model
{
    use HasFactory;

    // Userへの関連を定義
    public function user(){
        return $this->belongsTo(User::class);
    }
}
