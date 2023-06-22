<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Article;

class Article extends Model
{
    use HasFactory;

    // Userへの関連を定義
    public function user(){
        return $this->belongsTo(User::class);
    }

    // ArticleLikesへの関連を定義
    public function articleLikes(){
        return $this->belongsToMany(Article::class,'article_likes')->withTimestamps();
    }

    // ArticleTagsへの関連を定義
    public function articleTags(){
        return $this->belongsToMany(Article::class,'article_likes')->withTimestamps();
    }
}
