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
use Cron\MonthField;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // // 月報ランキング取得のテストクエリ
        // $fromDate = Carbon::now()->subMonthsWithNoOverflow(6)->startOfMonth();
        // $toDate = Carbon::now()->subMonthWithNoOverflow(1)->startOfMonth();
        // $fromDate = Carbon::parse($fromDate)->toDateString();
        // $toDate = Carbon::parse($toDate)->toDateString();
        // $monthlyReportRanking = MonthlyReport::with(['user'])->where('is_deleted',false)->selectRaw('sum(likes_count) as number_of_likes_count, user_id')->whereDate('target_month', '>=', $fromDate)->whereDate('target_month', '<=', $toDate)->groupBy('user_id')->orderBy('number_of_likes_count','DESC')->take(10)->get();

        // // ブログランキング取得のテストクエリ
        // $fromDate = Carbon::now()->subMonthsWithNoOverflow(5)->startOfMonth();
        // $toDate = Carbon::now()->endOfMonth();
        // $subQuery = Article::with(['user'])
        // ->whereBetween('shipped_at',[$fromDate,$toDate])
        // ->where('is_deleted',false)
        // ->withCount('ArticleLikes')
        // ->toSql();

        // $ArticleRanking = DB::table(DB::raw('('.$subQuery.') as likes_count_by_article'))
        // ->selectRaw('sum(article_likes_count) as number_of_article_likes, user_id')
        // ->groupBy('user_id')
        // ->setBindings([':fromDate'=>$fromDate,':toDate'=>$toDate,':is_deleted'=>false])
        // ->orderBy('number_of_article_likes','desc')
        // ->take(10)
        // ->get();
        // dd($monthlyReportRanking,$ArticleRanking);

        // タグ別投稿数ランキング取得のテストクエリ
        $subQuery = Article::with(['user','tags'])
        ->withCount('tags')
        ->toSql();
        dd($subQuery);


        $questions = Question::with(['user','tags','questionAnswers'])
        ->whereNotNull('shipped_at')
        ->where('is_deleted',false)
        ->orderBy('created_at','desc')->paginate(2);
        return view('Questions/index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Questions/create');
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
        return view('Questions/show',compact('question'));
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
        return view('Questions.edit',compact('question','tags'));
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
        $question = Question::find($question)->first();
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

        return to_route('questions.showMyDraftQuestions',Auth::user()->id)->with('status','情報を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question = Question::find($question)->first();
        $question->is_deleted = Carbon::now()->format('Y/m/d H:i:s');

        return to_route('questions.showMyQuestions',Auth::user()->id)->with('status','削除しました。');
    }

    public function showMyQuestions($id){
        $user = User::find($id);
        $questions =  Question::with(['user','tags','questionAnswers'])
        ->whereNotNull('shipped_at')
        ->where('is_deleted','=',false)->where('user_id','=',$user->id)
        ->orderBy('created_at','desc')
        ->paginate(2);

        $answers = 'test';
        return view('Questions/myQuestions',compact('questions','answers'));
    }

    public function showMyDraftQuestions($id){
        $user = User::find($id);
        $questions =  Question::with(['user','tags','questionAnswers'])
        ->whereNull('shipped_at')->where('user_id','=',$user->id)
        ->orderBy('created_at','desc')
        ->paginate(2);

        return view('Questions/myDraftQuestions',compact('questions'));
    }
}
