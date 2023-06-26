<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Models\Article;
use App\Models\MonthlyReport;
use App\Models\User;
use Carbon\Carbon;


class SearchUserService
{
    // ユーザー検索のクエリ
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

        $subQuery = $subQuery->paginate(20);
        return $subQuery;
    }
}
