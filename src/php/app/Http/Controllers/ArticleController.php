<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\User;
use App\Models\Tag;
use Ramsey\Uuid\Type\Integer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $articles = Article::all()->sortByDesc('created_at')->paginate(20);
        $articles = Article::query()
        ->orderByDesc('created_at')
        ->paginate(20);

        $keyword = $request->input('keyword');

        $query = Article::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
            $query->orWhereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%{$keyword}%");
                });

                $articles = $query->paginate(20);
        }


        return view('articles.index', compact('articles', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->shipped_at = Carbon::now()->format('Y/m/d H:i:s');
        $article->save();
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, User $user)
    {
        return view('articles.show', [
            'article' => $article,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }

    public function showArticles($id){
        $user = User::find($id);
        // $articles =  Article::with(['user','articleCategory'])
        $articles =  Article::with(['user'])
        ->whereNotNull('shipped_at')
        ->where('is_deleted','=',false)->where('user_id','=',$user->id)
        ->orderBy('created_at','desc')
        ->paginate(10);

        $answers = 'test';
        return view('articles.myblog',compact('user','articles'));
    }

}
