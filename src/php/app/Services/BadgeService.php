<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Models\Article;
use App\Models\MonthlyReport;
use App\Models\User;
use App\Models\UserBadge;
use Carbon\Carbon;


class BadgeService
{
    // 記事公開によってバッジステータスを上げる処理
    public static function upGradeBadgeStatus($request){
        $countOfArticles = Article::where($request->user()->id)->where('is_deleted',false)->count();
        $comment = '';

        if($countOfArticles === 1){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 1,],
            ['is_deleted' => false]);
            $comment = '1つ目の投稿です!メダルを獲得しました';
        } else if($countOfArticles=== 3){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 2,],
            ['is_deleted' => false]);
            $comment = '3つ目の投稿です!新しいメダルを獲得しました!';
        } else if($countOfArticles === 5){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 3,],
            ['is_deleted' => false]);
            $comment = '5つ目の投稿です!新しいメダルを獲得しました!';
        } else if($countOfArticles === 10){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 4,],
            ['is_deleted' => false]);
            $comment = '通算10投稿を達成したので、新しいメダルを獲得しました!';
        } else if($countOfArticles === 20){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 5,],
            ['is_deleted' => false]);
            $comment = '通算20投稿を達成したので、新しいメダルを獲得しました!';
        } else if($countOfArticles === 30){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 6,],
            ['is_deleted' => false]);
            $comment = '通算30投稿を達成したので、新しいメダルを獲得しました!';
        } else if($countOfArticles === 75){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 7,],
            ['is_deleted' => false]);
            $comment = '通算75投稿を達成したので、新しいメダルを獲得しました!';
        } else if($countOfArticles === 100){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 8,],
            ['is_deleted' => false]);
            $comment = '通算100投稿を達成したので、新しいメダルを獲得しました!';
        }

        return $comment;
    }

    // 記事削除によってバッジステータスを下げる処理
    public static function downGradeBadgeStatus($request){
        $countOfArticles = Article::where($request->user()->id)->where('is_deleted',false)->count();
        $comment = '';
        if($countOfArticles == 0){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 1,],
            ['is_deleted' => true]);
            $comment = 'メダルをすべて失いました。新しい投稿をしてメダルを獲得しましょう!';
        }else if(1 <= $countOfArticles < 3){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 2,],
            ['is_deleted' => true]);
            $comment = 'メダルを失いました。新しい投稿をしてメダルを獲得しましょう!';
        } else if(3 <= $countOfArticles < 5){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 3,],
            ['is_deleted' => true]);
            $comment = 'メダルを失いました。新しい投稿をしてメダルを獲得しましょう!';
        } else if(5 <= $countOfArticles < 10){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 4,],
            ['is_deleted' => true]);
            $comment = 'メダルを失いました。新しい投稿をしてメダルを獲得しましょう!';
        } else if(10 <= $countOfArticles < 20){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 5,],
            ['is_deleted' => true]);
            $comment = 'メダルを失いました。新しい投稿をしてメダルを獲得しましょう!';
        } else if(10 <= $countOfArticles < 30){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 6,],
            ['is_deleted' => true]);
            $comment = 'メダルを失いました。新しい投稿をしてメダルを獲得しましょう!';
        } else if(30 <= $countOfArticles < 75){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 7,],
            ['is_deleted' => true]);
            $comment = 'メダルを失いました。新しい投稿をしてメダルを獲得しましょう!';
        } else if(75 <= $countOfArticles < 100){
            $badge = UserBadge::updateOrCreate(['user_id' => $request->user()->id,'badge_id' => 8,],
            ['is_deleted' => true]);
            $comment = 'メダルを失いました。新しい投稿をしてメダルを獲得しましょう!';
        }

        return $comment;
    }

}
