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
					<h1>お気に入りブログ一覧</h1>
				</div>
				<div class="article-user">
					
					<!-- /* ブログ削除時メッセージ */ -->
					<!-- /* バッジ剥奪時メッセージ */ -->
						
		  			<div class="page-content mt-15px">
						<!-- ブログ一覧 -->
          @foreach($articleFavorites as $favorite)
		  @if ($favorite->is_deleted === false)
              <div class="card mt-3">
                  <div class="card-body">
					{{-- <a class="text-info" href="/articles?articleEntryDate={{ \Carbon\Carbon::parse($article->user->entry_date)->format('Y-m-d') }}">{{ $article->user->entry_date }}</a> --}}
                      <a class="text-dark" href="{{ route('articles.show', ['article' => $favorite->articles->id]) }}">
                          <h5 class="card-title">{{ $favorite->articles->title }}</h5>
                      </a>  
                  </div>
              </div>
			  @endif
          @endforeach

                          <!-- ページング -->
                          {{$articleFavorites->links('pagination::bootstrap-4')}}
            <hr>
        </body>
	  			<div class="page-footer"></div>
                  <a class="bg-primary" href="/articles">ブログトップへ</a>

	  		</div>