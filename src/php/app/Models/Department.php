<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    // userテーブルと紐付け
    public function user() {
        return $this->belongsTo(User::class);
    }
}
