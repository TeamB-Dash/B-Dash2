<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Dash</title>
	<link rel="stylesheet" media="all" href="/css/side_header.css">
	<link rel="stylesheet" media="all" href="/css/template.css">
	<link rel="stylesheet" href="/css/article/article_list.css">
	<link rel="stylesheet" href="/css/header-profile.css">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
	<script src="/js/template.js"></script>
	<script src="/js/common/inquiry.js"></script>
	<script src="/js/article/article_list.js"></script>
	<link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="/img/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/img/favicon/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/img/favicon/manifest.json">
	<link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#dd4814">
	<link rel="shortcut icon" href="/img/favicon/favicon.ico">
	<meta name="apple-mobile-web-app-title" content="Dash">
	<meta name="application-name" content="Dash">
	<meta name="msapplication-config" content="../../static/img/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<div class="site-body container-fluid">
		<div class="site-container row">
		
			<!-- 		menuここから  -->
			<header class="site-header bg-primary col-sm-2 hidden-xs side_scroll">
				<div class="header-menu center-block">
		<div class="header-menu-title">
			<a href="/"><h1 class="bg-primary">Dash</h1></a>
			<br>
			<li class="dropdown">
				<a class="lead bg-primary" href="/articles">
					<span class="glyphicon glyphicon-th-list"></span>
					<span> ブログ</span>
				</a>
				<ul class="nav nav-pills nav-stacked" style="padding-inline-start:10px;margin-bottom:10px;">
					<li style="margin-bottom:3px"><a class="bg-primary" href="/articles/create">新規投稿</a></li>
					{{-- ToDOログインした場合のみ表示させる --}}
					<li><a class="bg-primary" href="{{ route('articles.myblog',Auth::user()->id) }}">マイブログ</a></li>
					<li><a class="bg-primary" href="/articles/users-favorite/1422">お気に入りブログ</a></li>
				</ul>
		</div>
	</div>
			</header> 
			<!-- 		menuここまで  -->			
	        <div class="col-sm-7 col-sm-offset-3">
          
              <!-- /* バッジ獲得時メッセージ */ -->
		      
					
	          <div class="page-header">
	          	<div id="article-header">
					<span>【</span>
					<span>2023-04</span>
					<span>WEB</span>
					<span>】</span>
	          	</div>
				  <div id="article-body" class="panel-body">
					  <div class="markdown-view">
						  
						  <div class="container">
							  <div class="card mt-3">
								  <div class="card-body d-flex flex-row">
									  <i class="fas fa-user-circle fa-3x mr-1"></i>
									  <div>
										  <div class="font-weight-bold">
											  {{ $article->user->name }} 
											</div> 
											<div class="font-weight-lighter">
												{{ $article->created_at->format('Y/m/d H:i') }} に更新
											</div>
										</div>
									</div>
									<div>
										<span id="article-category" class="btn btn-xs none-pointer">備忘録</span>
									  <span class="h1 word-wrap">非同期通信について</span>
									</div>
								</div>
								<div class="page-body">
								  <div class="well well-sm" style="overflow:hidden">
								  
									  <div id="article-tag-list" class="tag-list bootstrap-tags bootstrap-3">
										<div class="tags" style="position: relative;">
											
												<div class="tag label btn-success md none-pointer">
													<span>&nbsp;&nbsp;JavaScript&nbsp;&nbsp;</span>
												</div>
										</div>
									  </div>
								  </div>  
							  </div>
							<div class="card-body pt-0 pb-2">
							  <h3 class="h4 card-title">
									{{ $article->title }}
								  </a>                                
								 </h3>
							  <div class="card-text">
								{!! nl2br(e( $article->body )) !!} 
							  </div>
							  <hr>
							</div>
						  </div>
					  </div>	
					</div>
				</div>
			</div>
		</div>
		<favorite-button>

			{{-- @if (Auth::check())
			@if ($articleFavorites)
			<form action="{{action(ArticleController::class,'unfavorite',$article->id)}}" method="POST" class="mb-4" >
			<input type="hidden" name="article_id" value="{{$article->id}}">
			@csrf
			@method('DELETE')
				<button type="submit">
				  ブックマーク解除
				</button>
			</form>
			@else
			<form action="{{action(ArticleController::class,'favorite')}}" method="POST" class="mb-4" >
			@csrf
			<input type="hidden" name="article_id" value="{{$article->id}}">
				<button type="submit">
				 ブックマーク
				</button>
			</form>
			@endif
		  @endif --}}
		  {{-- @if (Auth::check())
    @if ($articleFavorites)
        <form action="{{ route('articles.unfavorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            @method('DELETE')
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <button type="submit">
                お気に入り解除
            </button>
        </form>
    @else
        <form action="{{ route('articles.favorite') }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <button type="submit">
                お気に入り
            </button>
        </form>
    @endif
@endif --}}
{{-- @if (Auth::check())
    @if ($article->isFavoritedByUser(Auth::user()))
        <form action="{{ route('articles.unfavorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            @method('DELETE')
            <button type="submit">
                お気に入り解除
            </button>
        </form>
    @else
        <form action="{{ route('articles.favorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            <button type="submit">
                お気に入り
            </button>
        </form>
    @endif
@endif --}}

{{-- @if (Auth::check())
    @if ($article->isFavoritedByUser(Auth::user()))
        <form action="{{ route('articles.unfavorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            @method('DELETE')
            <button type="submit">
                お気に入り解除
            </button>
        </form>
    @else
        <form action="{{ route('articles.favorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            <button type="submit">
                お気に入り
            </button>
        </form>
    @endif
@else
    <p>お気に入り機能を利用するにはログインしてください。</p>
@endif --}}

@if (Auth::check())
    @if ($article->isFavoritedByUser(Auth::user()))
        <form action="{{ route('articles.unfavorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            @method('DELETE')
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <button type="submit">
                お気に入り解除
            </button>
        </form>
    @else
        <form action="{{ route('articles.favorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <button type="submit">
                お気に入り
            </button>
        </form>
    @endif
	@else
	<p>お気に入り機能を利用するにはログインしてください。</p>
@endif


{{-- @if (Auth::check())
    @if ($article->isFavoritedByUser(Auth::user()))
        <form action="{{ route('articles.unfavorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            @method('DELETE')
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <button type="submit">
                お気に入り解除
            </button>
        </form>
    @else
        <form action="{{ route('articles.favorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <button type="submit">
                お気に入り
            </button>
        </form>
    @endif
@endif --}}
		</favorite-button>

            <div class="pull-right article-user-link">
@if($article->user_id === Auth::user()->id)
    <li><a class="bg-primary" href="{{ route('articles.myblog', Auth::user()->id) }}">マイブログへ</a></li>
@else
    <a href="{{ route('articles.myblog', ['id' => $article->user_id]) }}"><span>{{ $article->user->name }}</span>さんのブログ一覧へ</a>
@endif
              </div>
            </div>
	            
	            <!-- /*下書きでなければコメント欄表示する*/ -->
	           	
	           		{{-- <div id="article-like-responsive">
			           	<div class="like-btn">
							<span class="hidden" id="login-user-name">喜多村太綱</span>
							<span role="button" class="btn like-button btn-success">いいね！</span>
						</div>
						<div class="like-count">
							<strong><a class="text-info article-like1" data-toggle="modal" data-target="#like-user-modal" href="">8</a></strong>
						</div>
					</div>
					<br>
					<div id="article-favorite-responsive">
						<div id="article-favorite-btn"> 
							<span class="hidden" id="login-user-name">喜多村太綱</span>
							<span role="button" class="btn change-favoriteBtn pushBtn" id="favorite-button-mobile">★お気に入り</span>
						</div>
				    </div>
						</div> --}}
						<br>
						<!-- /* コメント編集フォーム */ -->
					<div id="comment"></div>
		            <h2>コメント</h2>
								
				            </div>
						</div>
		            
		           
					<div class="markdown-editor">
		              <form class="new_article_comment" action="/article_comments" accept-charset="UTF-8" method="post"><input type="hidden" name="_csrf" value="fec033dd-189a-45e7-b179-0585526122aa">
						<input type="hidden" name="articleId" value="504">
		                <ul class="nav nav-tabs">
		                  <li class="tab-md-write active">
		                    <a data-toggle="tab" class="text-info" href="#new-comment-write">Write</a>
		                  </li>
		                  <li class="tab-md-preview">
		                    <a data-toggle="tab" class="text-info" href="#new-comment-preview">Preview</a>
		                  </li>
		                  <li class="pull-right">
		                    <button id="articleBtn" name="button" type="submit" class="btn btn-success">Comment</button>
		                  </li>
		                </ul>
		                <div class="tab-content markdown-content">
		                  <div class="tab-pane active" id="new-comment-write">
		                    <textarea id="articleComment" rows="5" class="form-control" name="comment"></textarea>
		                    <p>
		                      <a class="text-info" href="https://help.github.com/articles/basic-writing-and-formatting-syntax/" target="_blank">Markdown</a>
		                      <span>記法が使えます。</span>
		                    </p>
		                  </div>
		                  <div class="tab-pane content-md-preview markdown-body" id="new-comment-preview"></div>
		                </div>
		              </form>
		            </div>
	            
	          	<div class="page-footer"></div>
	          
	          </div>

</div></body> 