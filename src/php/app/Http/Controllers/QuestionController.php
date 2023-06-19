<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with(['user','tags','questionAnswers'])->where('is_deleted',false)->orderBy('created_at','desc')->paginate(2);
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
            $question = Question::create([
                'user_id' => $user->id,
                'title' => $request->title,
                'body' => $request->content,
                'is_deleted' =>false,
                'answer_count' => 0,
            ]);
            $question->tags()->syncWithPivotValues($request->tags,['is_deleted' => false]);
            DB::commit();
            return to_route('questions.index');
        }catch(\Exception $e){
            DB::rollBack();
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
        // dd($question);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    public function showMyQuestions($id){
        $user = User::find($id);
        $questions =  Question::with(['user','tags','questionAnswers'])
        ->where('is_deleted','=',false)->where('user_id','=',$user->id)
        ->orderBy('created_at','desc')
        ->paginate(2);

        $answers = 'test';
        return view('Questions/myQuestions',compact('questions','answers'));
    }

    public function showMyDraftQuestions($id){
        $user = User::find($id);
        $questions =  Question::with(['user','tags','questionAnswers'])
        ->whereNotNull('shipped_at')->where('user_id','=',$user->id)
        ->orderBy('created_at','desc')
        ->paginate(2);

        return view('Questions/myDraftQuestions',compact('questions'));
    }
}
