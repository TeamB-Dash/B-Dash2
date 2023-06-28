<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\MonthlyReport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\RankingService;
use App\Services\SearchService;
use Cron\MonthField;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $monthlyReportRanking = RankingService::MonthlyReportRanking();
        $articleRanking = RankingService::ArticleRanking();
        $rankingByNumberOfArticlesPerTag = RankingService::TagRanking();

        list($questions,$filteredBy) = SearchService::searchQuestions($request);

        return view('questions/index',compact('questions','filteredBy','monthlyReportRanking','articleRanking','rankingByNumberOfArticlesPerTag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $user = Auth::user();
            // 下書き保存か公開かで分岐
            if(isset($request->saveAsDraft)){
                $question = Question::create([
                    'user_id' => $user->id,
                    'title' => $request->title,
                    'body' => $request->content,
                    'is_deleted' =>false,
                    'answer_count' => 0,
                    'shipped_at' => null,
                ]);
            }else if(isset($request->create)){
                $question = Question::create([
                    'user_id' => $user->id,
                    'title' => $request->title,
                    'body' => $request->content,
                    'is_deleted' =>false,
                    'answer_count' => 0,
                    'shipped_at' => Carbon::now()->format('Y/m/d H:i:s'),
                ]);
            };

            $tags = [];

            foreach($request->tags as $tag){
                $tagInstance = Tag::firstOrCreate(['name' => $tag]);
                $tags[] = $tagInstance->id;
            }

            $question->tags()->syncWithPivotValues($tags,['is_deleted' => false]);
            DB::commit();
            return to_route('questions.index')->with('status','投稿を作成しました。');
        }catch(\Exception $e){
            DB::rollBack();
            return route('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question = Question::find($question->id);
        return view('questions/show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $question = Question::with(['tags'])->find($question->id);
        $tags = $question->tags;
        return view('questions.edit',compact('question','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        // 下書き保存の更新処理
        if(isset($request->saveAsDraft)){
            $question->title = $request->title;
            $question->body = $request->content;
            $question->shipped_at = null;
        // 公開した質問の更新処理
        }else if(isset($request->update)){
            $question->title = $request->title;
            $question->body = $request->content;
        // 下書きを公開する処理
        }else if(isset($request->saveAsPublicQuestion)){
            $question->title = $request->title;
            $question->body = $request->content;
            $question->shipped_at = Carbon::now()->format('Y/m/d H:i:s');
        }
        $question->save();

        // タグの保存
        $tags = [];
        foreach($request->tags as $tag){
            $tagInstance = Tag::firstOrCreate(['name' => $tag]);
            $tags[] = $tagInstance->id;
        }
        $question->tags()->syncWithPivotValues($tags,['is_deleted' => false]);

        // return redirect()->back()->with('status','情報を更新しました。');
        return to_route('questions.show',$request->id)->with('status','情報を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->is_deleted = true;
        $question->save();

        return to_route('questions.showMyQuestions',Auth::user()->id)->with('status','削除しました。');
    }

    public function showMyQuestions($id){
        $user = User::find($id);
        $questions =  Question::with(['user','tags','questionAnswers'])
        ->whereNotNull('shipped_at')
        ->where('is_deleted','=',false)->where('user_id','=',$user->id)
        ->orderBy('created_at','desc')
        ->paginate(2);

        return view('questions/myQuestions',compact('questions'));
    }

    public function showMyDraftQuestions($id){
        $user = User::find($id);
        $questions =  Question::with(['user','tags','questionAnswers'])
        ->whereNull('shipped_at')->where('user_id','=',$user->id)
        ->orderBy('created_at','desc')
        ->paginate(2);

        return view('questions/myDraftQuestions',compact('questions'));
    }

    public function noAnswers(){
        $questions = Question::doesntHave('questionAnswers')
        ->whereNotNull('shipped_at')
        ->where('is_deleted',false)
        ->orderBy('created_at','desc')->get();

        return view('questions/noAnswers',compact('questions'));
    }
}
