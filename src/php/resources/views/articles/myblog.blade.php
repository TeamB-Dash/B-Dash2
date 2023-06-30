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
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap -m-12">
      <div class="w-full">
          <button
          type="button"
          onclick="location.href='{{ route('articles.showMyDraftArticles', Auth::user()->id) }}' "
          class="inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
          style="background-color:rgb(178, 106, 245)"
          data-te-ripple-init
          data-te-ripple-color="light">
          下書き中のブログ一覧へ
          </button>
      </div>

      @if ($articles->count() === 0)
      <div class="w-full">表示するブログはありません</div>
      @else
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
                                          <i class="fas fa-pen mr-1"></i>ブログを更新する
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                                          <i class="fas fa-trash-alt mr-1"></i>ブログを削除する
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
                        @endif
                    </div>
                </div>
            </div>
        </body>
	  			<div class="page-footer"></div>
                  <a class="bg-primary" href="/articles">ブログトップへ</a>

	  		</div>

        <x-app-layout>
          <x-slot name="header">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              マイブログ一覧
              </h2>
          </x-slot>
      
          <section class="text-gray-600 body-font overflow-hidden">
              @if (session('status'))
              <div class="w-2/3 mx-auto container mt-6 text-center bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                  <p class="font-bold">{{ session('status') }}</p>
              </div>
              @endif
              <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-12">
                  <div class="w-full">
                      <button
                      type="button"
                      onclick="location.href='{{ route('articles.showMyDraftArticles', Auth::user()->id) }}' "
                      class="inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                      style="background-color:rgb(178, 106, 245)"
                      data-te-ripple-init
                      data-te-ripple-color="light">
                      下書き中のブログ一覧へ
                      </button>
                  </div>
      
                  @if ($articles->count() === 0)
                  <div class="w-full">表示するブログはありません</div>
                  @else
      
                      @foreach ($articles as $article) 
                      <div class="p-12 md:w-1/2 flex flex-col items-start">
                          <a class="inline-flex items-center">
                          <img alt="blog" src="https://dummyimage.com/104x104" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                          <span class="flex-grow flex flex-col pl-4">
                              <span class="title-font font-medium text-gray-900">{{ $article->user->name }}</span>
                              <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{ $article->created_at->format('Y/m/d H:i') }}</span><span>【{{$article->user->department->name}}】</span>
                          </span>
                          </a>
                          @foreach ($article->tags as $tag )
                          <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">{{ $tag->name }}</span>
                          @endforeach
                      <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
                          <a class="text-indigo-500 inline-flex items-center">Learn More
                          <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 12h14"></path>
                              <path d="M12 5l7 7-7 7"></path>
                          </svg>
                          </a>
                          <span class="text-gray-400 mr-3 inline-flex items-center ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                          <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                              <circle cx="12" cy="12" r="3"></circle>
                          </svg>1.2K
                          </span>
                          <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                          <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                              <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                          </svg>
                          {{-- {{ $article->articleComments->count() }} --}}
                          </span>
                      </div>
                      <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4"><a href="{{ route('articles.show', ['article' => $article]) }}">{{$article->title}}</a></h2>
                      <p class="leading-relaxed mb-8">{{$article->body}}</p>
                      </div>
                      @endforeach
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
                                          <i class="fas fa-pen mr-1"></i>ブログを更新する
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                                          <i class="fas fa-trash-alt mr-1"></i>ブログを削除する
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
      
                  {{ $articles->links() }}
                </div>
                @endif
      
              </div>
              <div class="page-footer"></div>
                  <a class="bg-primary" href="/articles">ブログトップへ</a>

	  		</div>
      
              {{-- 質問一覧 --}}
              <x-answerpanel></x-answerpanel>
      
            </section>
      </x-app-layout>
      