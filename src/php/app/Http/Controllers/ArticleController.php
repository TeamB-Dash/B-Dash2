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
        $articles = Article::query()
        ->orderByDesc('created_at')
        ->paginate(20);
        
        // キーワード検索
    $keyword = $request->input('keyword');
    $article_category_id = $request->input('article_category_id');

        $query = Article::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
            $query->orWhereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%{$keyword}%");
                });
                
                
                $articles = $query
                ->orderByDesc('created_at')
                ->paginate(20);
        }

        if (!empty($article_category_id)) {
            $query->where('article_category_id', $article_category_id);
            $articles = $query
            ->orderByDesc('created_at')
            ->paginate(20);
        }
        


        return view('articles.index', compact('articles', 'keyword','article_category_id'));
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


        // $articleFavorites = new ArticleFavorites;
        // $articleFavorites->article_id = $request->article_id;
        // $articleFavorites->user_id = Auth::user()->id;
        // $articleFavorites->save();

    
        // return redirect()->route('articles.index',[$request->article_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, User $user)
    {

        //お気に入り処理
        // $articleFavorites=ArticleFavorites::where('article_id', $article->id)->where('user_id', auth()->user()->id)->first();

        return view('articles.show', [
            'article' => $article,
            'user' => $user,
            // 'articleFavorites' => $articleFavorites,
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


        // $article=Article::findOrFail($id);

        // $article->articleFavorites()->delete();


        // return redirect()->route('articles.index',[$request->article_id]);
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

    // public function favorite(Article $article, Request $request){

    //     $articleFavorites=New ArticleFavorites();
    //     $articleFavorites->article_id=$article->id;
    //     $articleFavorites->user_id=Auth::user()->id;
    //     $articleFavorites->save();
    //     return back();
    // }

    // public function unfavorite(Article $article, Request $request){
    //     $user=Auth::user()->id;
    //     $articleFavorites=ArticleFavorites::where('article_id', $article->id)->where('user_id', $user)->first();
    //     $articleFavorites->delete();
    //     return back();
    // }

}