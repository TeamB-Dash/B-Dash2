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
							<form class="logout_link" action="/logout" name="logout1" method="post"><input type="hidden" name="_csrf" value="fec033dd-189a-45e7-b179-0585526122aa">
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
              <div class="pull-right article-user-link">
                <a href="/articles/users/1527"><span>内田七虹</span>さんのブログ一覧へ</a>
                {{-- <a href="{{route(/articles/users/)}}"><span>内田七虹</span>さんのブログ一覧へ</a> --}}
              </div>
            </div>
	            {{-- <div class="modal fade" id="article-confirm">
	              <div class="modal-dialog">
	                <div class="modal-content">
	                  <div class="modal-header">
	                    <div class="modal-title">ブログを削除</div>
	                  </div>
	                  <div class="modal-body">本当にこのブログを削除しますか?</div>
	                  <div class="modal-footer">
	                  	<form id="delete-article-form" method="post" name="form1" action="/articles/delete/504"><input type="hidden" name="_csrf" value="fec033dd-189a-45e7-b179-0585526122aa">
						    <input type="hidden" name="shippedAt" value="2023-06-15" 13:38:40.0="">
						    <input class="btn btn-danger" type="submit" value="はい">
						</form>
	                    <button class="btn btn-default" data-dismiss="modal" type="button">閉じる</button>
	                  </div>
	                </div>
	              </div>
	            </div> --}}
	            
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
					<div class="modal fade" id="like-user-modal" tabindex="-1">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header-like">
										<h4 class="modal-title text-center">
											<span id="article-like2">8</span>人がいいね！と言っています
										</h4>
									</div>
									<div class="modal-body">
										<div class="list-group" id="like-users-list">
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1532">三好菜月</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/839">東黒島新建</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/387">梶田美妃</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/854">伏木国隆</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1511">谷口智紀</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1525">垣越隆伸</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1530">玉井悠輔</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1535">奧麟平</a>
											</div>
										<a class="list-group-item hidden" href="/user_profiles/">喜多村太綱</a></div>
									</div>
									<div class="modal-footer">
										<button class="btn btn-success" data-dismiss="modal">閉じる</button>
									</div>
								</div>
							</div>
						</div> --}}
						<br>
					<div id="comment"></div>
		            <h2>コメント</h2>
		            <!-- 直前の処理の完了通知-->
						
						
					<!-- 直前の処理の完了通知ここまで-->
		            
			            {{-- <div>
				            <div class="panel panel-default" id="comment-table-80">
								<div class="panel-heading article-panel-header" id="comment-header-80">
									
										<a class="text-info" href="/user_profiles/1532"><span>三好菜月</span></a>さんが
									
									
					                
					                <span>2023/06/15 15:41</span>にコメント
									<div class="pull-right">
										
									</div>
									<div class="pull-right">
										
									</div>				          
								</div>
								<div class="panel-body" id="comment-80">
					                <div class="markdown-view">
					                  <textarea class="hidden">## ありがとう！
私もちょうどチーム演習を終えて**非同期**とは…となっていたのですごく参考になります</textarea>
					                  <div class="markdown-body"><h2>ありがとう！</h2>
<p>私もちょうどチーム演習を終えて<strong>非同期</strong>とは…となっていたのですごく参考になります</p>
</div>
				            	    </div>
				              	</div>
								  
				            </div>
						</div> --}}
						<!-- /* コメント編集フォーム */ -->
			            {{-- <div>
				            <div class="panel panel-default" id="comment-table-83">
								<div class="panel-heading article-panel-header" id="comment-header-83">
									
										<a class="text-info" href="/user_profiles/1511"><span>谷口智紀</span></a>さんが
									
									
					                
					                <span>2023/06/16 09:11</span>にコメント
									<div class="pull-right">
										
									</div>
									<div class="pull-right">
										
									</div>				          
								</div>
								<div class="panel-body" id="comment-83">
					                <div class="markdown-view">
					                  <textarea class="hidden">## わかりやすい！</textarea>
					                  <div class="markdown-body"><h2>わかりやすい！</h2>
</div>
				            	    </div>
				              	</div> --}}
								<!-- /* コメント編集フォーム */ -->
								
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
          
	           {{-- <!-- サイドバー（右） -->
	        	<div id="right-side-menu" class="col-sm-2" style="height: 2852.55px;">
	        		 <div id="side-menu-adjust"></div>
		         	 <div id="article-like" class="sticky text-center">
		         	 	<div id="side-article-like-count" class="text-center">
							<strong><a class="text-info h4 article-like1" data-toggle="modal" data-target="#like-user-modal" href="">8</a></strong>
						</div>
						<div id="article-like-btn" class="like-btn text-center">
							<span class="hidden" id="login-user-name">喜多村太綱</span>
							<span role="button" class="btn like-button btn-success">いいね！</span>
						</div>
						<br><br><br>
						<div id="article-favorite-btn" class="like-btn text-center"> 
							<span class="hidden" id="login-user-name">喜多村太綱</span>
							<span role="button" class="btn change-favoriteBtn pushBtn" id="favorite-button">★お気に入り</span>
						</div>
						<!-- 目次 -->
						<div id="table-of-contents" class="text-left"><div class="table-of-content" style="margin-left: 10px;"><a href="#概要">概要</a></div><div class="table-of-content" style="margin-left: 10px;"><a href="#非同期処理について">非同期処理について</a></div><div class="table-of-content" style="margin-left: 10px;"><a href="#Ajaxとは">Ajaxとは</a></div><div class="table-of-content" style="margin-left: 10px;"><a href="#コードサンプル">コードサンプル</a></div><div class="table-of-content" style="margin-left: 10px;"><a href="#まとめ">まとめ</a></div></div>
					</div>
						<div class="modal fade" id="like-user-modal" tabindex="-1">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header-like">
										<h4 class="modal-title text-center">
											<span id="article-like2">8</span>人がいいね！と言っています
										</h4>
									</div>
									<div class="modal-body">
										<div class="list-group" id="like-users-list">
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1532">三好菜月</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/839">東黒島新建</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/387">梶田美妃</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/854">伏木国隆</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1511">谷口智紀</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1525">垣越隆伸</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1530">玉井悠輔</a>
											</div>
											<div>
												
												<a class="list-group-item text-left" href="/user_profiles/1535">奧麟平</a>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button class="btn btn-success" data-dismiss="modal">閉じる</button>
									</div>
								</div>
							</div>
						</div>
		       	</div> 
			<!-- </div> -->
		</div>
	
</div></body> --}}