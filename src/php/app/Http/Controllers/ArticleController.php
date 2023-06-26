<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\User;
use App\Models\Tag;
use App\Models\ArticleFavorites;
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
        $articlesQuery = Article::query()
            ->orderByDesc('created_at');
    
        $keyword = $request->input('keyword');
        $article_category_id = $request->input('article_category_id');
        $department_id = $request->input('department_id');
    
        if (!empty($keyword)) {
            $articlesQuery->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', "%{$keyword}%")
                    ->orWhere('body', 'LIKE', "%{$keyword}%")
                    ->orWhereHas('user', function ($q) use ($keyword) {
                        $q->where('name', 'LIKE', "%{$keyword}%");
                    });
            });
        }
    
        if (!empty($article_category_id)) {
            $articlesQuery->where('article_category_id', $article_category_id);
        }
    
        if (!empty($department_id)) {
            $articlesQuery->whereHas('user', function ($q) use ($department_id) {
                $q->where('department_id', $department_id);
            });
        }
    
        $articles = $articlesQuery->paginate(20);
    
        return view('articles.index', compact('articles', 'keyword', 'article_category_id', 'department_id'));
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
    public function show(Article $article, User $user, ArticleFavorites $articleFavorites)
    {

        //お気に入り処理
        // $articleFavorites=ArticleFavorites::where('article_id', $article->id)->where('user_id', auth()->user()->id)->first();

        return view('articles.show', [
            'article' => $article,
            'user' => $user,
            'articleFavorites' => $articleFavorites,
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
        $articles =  Article::with(['user'])
        ->whereNotNull('shipped_at')
        ->where('is_deleted','=',false)->where('user_id','=',$user->id)
        ->orderBy('created_at','desc')
        ->paginate(10);

        $answers = 'test';
        return view('articles.myblog',compact('user','articles'));
    }

    public function showFavoriteArticles($id)
{
    // ユーザーのお気に入り記事を取得
    $user = User::find($id);
    $articleFavorites = $user->articleFavorites()->with('user')
    ->orderBy('created_at', 'desc')
    ->paginate(10);
    
    return view('articles.favorites', compact('user','articleFavorites'));
}


public function favorite(Article $article, Request $request)
{
    if (Auth::check()) {
        $user = Auth::user();
        $articleFavorites = new ArticleFavorites;
        $articleFavorites->user_id = $user->id;
        $articleFavorites->article_id = $article->id;
        $articleFavorites->is_deleted = false;
        $articleFavorites->save();
    }

    return redirect()->route('articles.show', ['article' => $article->id]);
}



public function unfavorite(Article $article, Request $request)
{
if (Auth::check()) {
    $user = Auth::user();

    $article->articleFavorites()
    ->where('article_id', $article->id)
    ->update(['is_deleted' => true]);
}
    return redirect()->route('articles.show', ['article' => $article->id]);
}


}