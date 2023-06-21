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
			<div class="ml-par20 col-sm-6">
				<div class="page-header">
					<h1>マイブログ一覧</h1>
				</div>
				<div class="article-user">
					
					<!-- /* ブログ削除時メッセージ */ -->
					<!-- /* バッジ剥奪時メッセージ */ -->
						
		  			<div class="page-content mt-15px">
						<!-- ブログ一覧 -->

                        <div class="container">
                            @foreach($articles as $article) 
                              <div class="card mt-3">
                                <div class="card-body d-flex flex-row">
                                  <i class="fas fa-user-circle fa-3x mr-1"></i>
                                    <div class="font-weight-lighter">
                                      {{ $article->created_at->format('Y/m/d H:i') }} 
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body pt-0 pb-2">
                                  <h3 class="h4 card-title">
                                    <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
                                        {{ $article->title }}
                                      </a>                                
                                     </h3>
                                  @if( Auth::id() === $article->user_id )
                                  <!-- dropdown -->
                                  <div class="ml-auto card-text">
                                    <div class="dropdown">
                                      <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <button type="button" class="btn btn-link text-muted m-0 p-2">
                                          <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                      </a>
                                      <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
                                          <i class="fas fa-pen mr-1"></i>記事を更新する
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                                          <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- dropdown -->
                          
                                  <!-- modal -->
                                  <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                                          @csrf
                                          @method('DELETE')
                                          <div class="modal-body">
                                            {{ $article->title }}を削除します。よろしいですか？
                                          </div>
                                          <div class="modal-footer justify-content-between">
                                            <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                            <button type="submit" class="btn btn-danger">削除する</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- modal -->
                                @endif

                                  <hr>
                                </div>
                              </div>
                            @endforeach 
                          </div>	
                          <!-- ページング -->
                          {{$articles->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
        </body>
	  			<div class="page-footer"></div>
                  <a class="bg-primary" href="/articles">ブログトップへ</a>

	  		</div>