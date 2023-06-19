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
	<div class="site-body container-fluid">
		<div class="site-container row">
		
			<!-- 		menuここから  -->
			<header class="site-header bg-primary col-sm-2 hidden-xs side_scroll">
				<div class="header-menu center-block">
		<div class="header-menu-title">
			<a href="/"><h1 class="bg-primary">Dash</h1></a>
			<br>
			<ul class="nav nav-pills nav-stacked">
				<li class="dropdown">
				<a class="lead bg-primary" href="/monthly_reports">
					<span class="glyphicon glyphicon-th-list"></span>
					<span> 月報</span>
				</a>
				<ul class="nav nav-pills nav-stacked" style="padding-inline-start:10px;margin-bottom:10px;">
					<li>
						
						<a class="bg-primary" href="/monthly_reports/edit">月報登録</a>
					</li>
					<li style="margin-bottom:1px">
						<a class="bg-primary" href="/monthly_reports/users/1422">マイ月報</a>
					</li>
				</ul>
			</li>
				<li class="dropdown">
				<a class="lead bg-primary" href="/articles">
					<span class="glyphicon glyphicon-th-list"></span>
					<span> ブログ</span>
				</a>
				<ul class="nav nav-pills nav-stacked" style="padding-inline-start:10px;margin-bottom:10px;">
					<li style="margin-bottom:3px"><a class="bg-primary" href="/articles/new">新規投稿</a></li>
					<li><a class="bg-primary" href="/articles/users/1422">マイブログ</a></li>
					<li><a class="bg-primary" href="/articles/users-favorite/1422">お気に入りブログ</a></li>
				</ul>
			</li>
				<li class="dropdown">
				<a class="lead bg-primary" href="/questions">
					<span class="glyphicon glyphicon-th-list"></span>
					<span> Q&amp;A</span>
				</a>
				<ul class="nav nav-pills nav-stacked" style="padding-inline-start:10px;margin-bottom:10px;">
					<li style="margin-bottom:3px"><a class="bg-primary" href="/questions/new">質問投稿</a></li>
					<li><a class="bg-primary" href="/questions/users/1422">マイ質問
					
					</a>
					</li>
				</ul>
			</li>
				<li class="dropdown">
				<a class="lead bg-primary" href="/userSearch">
					<span aria-hidden="true" class="glyphicon glyphicon-search"></span>
					<span> ユーザー検索</span>
				</a>
			</li>
			</ul>
			<ul class="nav nav-pills nav-stacked dropup" style="margin-top: 40px;">
				<li class="dropdown">
					<a aria-expanded="false" class="lead bg-primary dropdown-toggle" data-toggle="dropdown">
						<span aria-hidden="true" class="glyphicon glyphicon-user"></span>
						
						<span>喜多村太綱</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/user_profiles/1422">プロフィール</a></li>
						<li><a data-confirm="パスワードを変更しますか？一旦、ログアウトします。" href="/logout_password_resets">パスワード変更</a></li>
						<li><a data-toggle="modal" data-target="#new_inquiry" href="#">お問い合わせ</a></li>
						<li>
							<form class="logout_link" action="/logout" name="logout1" method="post"><input type="hidden" name="_csrf" value="f89133f8-74aa-4fd4-8d51-94dd5681ebd9">
								<a class="logout_link" rel="nofollow" data-method="delete" href="javascript:logout1.submit()">ログアウト</a>
                   			</form>
						</li>	
					</ul>
				</li>
			</ul>
		</div>
	</div>
			</header>
			<!-- 		menuここまで  -->
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
                                  <div>
                                    <div class="font-weight-bold">
                                      {{ $article->user->name }} 
                                    </div> 
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
                                  <div class="card-text">
                                    {{ Str::limit($article->body, 150, '...') }}
                                  </div>
                                  <hr>
                                </div>
                              </div>
                            @endforeach 
                          </div>	
                          <!-- ページング -->
                          {{-- {{$articles->links('pagination::bootstrap-4')}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </body>
	  			<div class="page-footer"></div>
	  		</div>
			
			<!-- side content -->
					{{-- <div class="text-center" style="margin-bottom:1.5rem">
						<span>
							<a class="text-info side-dep" href="/articles?articleDepartmentId=1">【 WEB 】</a>
						</span><span>
							<a class="text-info side-dep" href="/articles?articleDepartmentId=2">【 CL 】</a>
						</span><span>
							<a class="text-info side-dep" href="/articles?articleDepartmentId=3">【 ML 】</a>
						</span><span>
							<a class="text-info side-dep" href="/articles?articleDepartmentId=4">【 内勤 】</a>
						</span><span>
							<a class="text-info side-dep" href="/articles?articleDepartmentId=6">【 FR 】</a>
						</span><span>
							<a class="text-info side-dep" href="/articles?articleDepartmentId=7">【 QA 】</a>
						</span><span>
							<a class="text-info side-dep" href="/articles?articleDepartmentId=8">【 PHP 】</a>
						</span>
					</div>
					<div class="text-center" style="padding-bottom:1.5rem">
						<span>
							<a class="btn btn-sm btn-outline-primary btn-primary side-category" href="/articles?articleCategoryId=1">備忘録</a>
						</span><span>
							<a class="btn btn-sm btn-outline-primary btn-primary side-category" href="/articles?articleCategoryId=2">技術共有</a>
						</span><span>
							<a class="btn btn-sm btn-outline-primary btn-primary side-category" href="/articles?articleCategoryId=3">体験共有</a>
						</span><span>
							<a class="btn btn-sm btn-outline-primary btn-primary side-category" href="/articles?articleCategoryId=4">その他</a>
						</span>
					</div>
					
				<div class="rank-div">
						<h4>いいね！獲得ランキング</h4>
						<h5>対象月：2023年1月～2023年6月</h5>
						<br>
						
					<div>
							<p>
								<span>1.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=1482&amp;articleUserName=%E5%B6%8B%E7%94%B0%E7%B4%94%E5%B8%8C">嶋田純希</a></span>
								<span> 👍217</span>
							</p>
							<p>
								<span>2.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=1490&amp;articleUserName=%E6%9C%9B%E6%9C%88%E8%8A%B1">望月花</a></span>
								<span> 👍97</span>
							</p>
							<p>
								<span>3.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=1496&amp;articleUserName=%E6%96%B0%E5%9E%A3%E5%A4%AA%E4%B9%85%E6%9C%97">新垣太久朗</a></span>
								<span> 👍68</span>
							</p>
							<p>
								<span>3.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=1380&amp;articleUserName=%E6%A9%8B%E6%9C%AC%E8%91%89%E4%BB%8B">橋本葉介</a></span>
								<span> 👍68</span>
							</p>
							<p>
								<span>5.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=1491&amp;articleUserName=%E7%9F%B3%E9%87%8E%E6%97%AD%E5%95%93">石野旭啓</a></span>
								<span> 👍65</span>
							</p>
							<p>
								<span>6.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=1391&amp;articleUserName=%E8%B2%9D%E5%8E%9F%E5%B0%86%E6%98%9F">貝原将星</a></span>
								<span> 👍59</span>
							</p>
							<p>
								<span>7.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=363&amp;articleUserName=%E5%B0%8F%E5%B7%9D%E7%B5%90%E5%AD%90">小川結子</a></span>
								<span> 👍55</span>
							</p>
							<p>
								<span>8.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=1481&amp;articleUserName=%E6%A8%AA%E5%B1%B1%E7%BF%94%E4%B8%80">横山翔一</a></span>
								<span> 👍45</span>
							</p>
							<p>
								<span>8.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=1485&amp;articleUserName=%E7%94%B0%E5%B7%BB%E4%BD%B3%E7%A5%90">田巻佳祐</a></span>
								<span> 👍45</span>
							</p>
							<p>
								<span>10.</span>
								<span> 👤</span>
								<span><a class="likeRankUserName" href="/articles?articleUserId=1480&amp;articleUserName=%E5%AF%8C%E7%94%B0%E7%9B%B4%E5%B8%8C">富田直希</a></span>
								<span> 👍37</span>
							</p>
							<br>
					</div>
				</div>

				<div class="rank-div hidden-xs">
					<h4>タグ別投稿数ランキング</h4>
					<div>
						<div class="tag-rank">
							<div class="tag-rank-num">1.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=996">CL</a>
							<span>(<span>41</span>)</span>
						</div>
						<div class="tag-rank">
							<div class="tag-rank-num">2.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=74">AWS</a>
							<span>(<span>25</span>)</span>
						</div>
						<div class="tag-rank">
							<div class="tag-rank-num">3.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=208">Vue.js</a>
							<span>(<span>25</span>)</span>
						</div>
						<div class="tag-rank">
							<div class="tag-rank-num">4.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=61">Linux</a>
							<span>(<span>19</span>)</span>
						</div>
						<div class="tag-rank">
							<div class="tag-rank-num">5.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=6">Java</a>
							<span>(<span>16</span>)</span>
						</div>
						<div class="tag-rank">
							<div class="tag-rank-num">6.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=8">PHP</a>
							<span>(<span>13</span>)</span>
						</div>
						<div class="tag-rank">
							<div class="tag-rank-num">7.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=55">VMware</a>
							<span>(<span>11</span>)</span>
						</div>
						<div class="tag-rank">
							<div class="tag-rank-num">8.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=298">インフラ</a>
							<span>(<span>11</span>)</span>
						</div>
						<div class="tag-rank">
							<div class="tag-rank-num">9.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=541">ESXi</a>
							<span>(<span>10</span>)</span>
						</div>
						<div class="tag-rank">
							<div class="tag-rank-num">10.</div>
							<a class="tag label label-success tag-rank-name" href="/articles?articleTagId=886">自己学習</a>
							<span>(<span>10</span>)</span>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div> --}}
