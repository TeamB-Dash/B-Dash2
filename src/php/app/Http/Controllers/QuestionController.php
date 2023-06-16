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
        // $user = User::where('id',1)->first();
        // $questions = Question::where('is_deleted',false)->orderBy('created_at','desc')->paginate(5);
        $questions = Question::with(['user','tags','questionAnswers'])->where('is_deleted',false)->orderBy('created_at','desc')->paginate(2);
        // dd($questions);
        return view('Questions/index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::where('status',1)->inRandomOrder()->take(10)->get();
        return view('Questions/create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // DB::beginTransaction();
        // try{
            $user = Auth::user();
            $question = Question::create([
                'user_id' => $user->id,
                'title' => $request->title,
                'body' => $request->content,
                'is_deleted' =>false,
                'answer_count' => 0,
            ]);
        // dd($request->tags);
            $question->tags()->sync($request->tags);
            // DB::commit();
            return view('dashboard');
        // }catch(\Exception $e){
        //     DB::rollBack();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
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
}
