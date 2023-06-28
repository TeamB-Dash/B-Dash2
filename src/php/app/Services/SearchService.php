<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Models\Article;
use App\Models\MonthlyReport;
use App\Models\User;
use App\Models\Question;
use Carbon\Carbon;


class SearchService
{
    /**
     * ユーザー検索のメソッド
     *
     * 勤務状況、氏名、入社日、所属それぞれの条件によって検索
     * @return User
     */
    public static function searchUser($request){
        $subQuery = User::query();

        if(isset($request->status)){
            if($request->status === "retired"){
                $subQuery = $subQuery->whereNotNull('deleted_at');
            }else if($request->status === "working"){
                $subQuery = $subQuery->whereNull('deleted_at');
            }
        }

        if(isset($request->name)){
            // 全角スペースを半角スペースに
            $spaceConversion = mb_convert_kana($request->name, 's');
            // ,や半角スペースなどで分けて配列に
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion,-1,PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $word){
                $subQuery = $subQuery->where('name','LIKE','%'.$word.'%');
            }
        }

        if(isset($request->hireMonth)){
            $subQuery = $subQuery->where('entry_date','LIKE',$request->hireMonth.'%');
        }

        if(isset($request->department)){
            $subQuery = $subQuery->where('department_id', '=', $request->department);
        }

        $users = $subQuery->paginate(20);
        return $users;
    }

    /**
     * QA検索のクエリ
     *
     * キーワード、所属、入社日のいづれかで条件分岐して検索
     * @return Question
     */
    public static function searchQuestions($request){
        $subQuery = Question::query();

        if(isset($request->keyword)){
            // 全角スペースを半角スペースに
            $spaceConversion = mb_convert_kana($request->keyword, 's');
            // ,や半角スペースなどで分けて配列に
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion,-1,PREG_SPLIT_NO_EMPTY);

            foreach( $wordArraySearched as $word){
                $subQuery = $subQuery
                ->where('title','LIKE','%'.$word.'%')
                ->orWhere('body','LIKE','%'.$word.'%')
                ->orWhereHas('user',function($query) use ($word){
                    $query->where('name','LIKE','%'.$word.'%');
                });
            }
        }else if(isset($request->department)){
            $department = $request->department;
            $subQuery = $subQuery->whereHas('user',function($query) use ($department){
                $query->where('department_id',$department);
            });
        } else if(isset($request->hireMonth)){
            $hireMonth = $request->hireMonth;
            $subQuery = $subQuery->whereHas('user',function($query) use ($hireMonth) {
                $query->where('entry_date', 'LIKE', $hireMonth.'%');
            });
        }

        $questions = $subQuery->where('is_deleted',false)->orderBy('created_at','desc')->paginate(20);
        return $questions;
    }
}
