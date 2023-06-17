
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8" />
	<meta content="IE=edge" http-equiv="X-UA-Compatible" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Dash</title>
	<link rel="stylesheet" media="all" href="{{ asset('/css/side_header.css') }}" />
	<link rel="stylesheet" media="all" href="{{ asset('/css/template.css') }}"/>
	<link rel="stylesheet" media="all" href="{{ asset('/css/monthly_report/detail.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/css/header-profile.css') }}" />
	<script src="{{ asset('/js/template.js') }}"></script>
	<script src="{{ asset('/js/common/inquiry.js') }}"></script>
	<script src="{{ asset('/js/monthly_report/detail-like-count.js') }}"></script>
	<script src="{{ asset('/js/monthly_report/detail-comment-edit.js') }}"></script>
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
	<script>
	$(function(){
  		var target = $('#report-tag-list');
  		var tagNames = [ "Python","Docker","FastAPI","GCP" ];

		  target.tags({
    		readOnly: true,
    		tagData: tagNames,
    		tagClass: 'btn-success',
  		});
	
  	target.find('.tags').css('position', 'relative');
  	target.css('pointer-events', 'none');
	});
	</script>
</head>
<body>
	<div class="site-body container-fluid">
		<div class="site-container row">
		
			<!-- 		menuここから  -->
			<header class="site-header bg-primary col-sm-2 hidden-xs side_scroll">
				<div class="header-menu center-block">
		<div class="header-menu-title" >
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
						<a class="bg-primary" href="/monthly_reports/users/1135">マイ月報</a>
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
					<li><a class="bg-primary" href="/articles/users/1135">マイブログ</a></li>
					<li><a class="bg-primary" href="/articles/users-favorite/1135">お気に入りブログ</a></li>
				</ul>
			</li>
				<li class="dropdown">
				<a class="lead bg-primary" href="/questions">
					<span class="glyphicon glyphicon-th-list"></span>
					<span> Q&A</span>
				</a>
				<ul class="nav nav-pills nav-stacked" style="padding-inline-start:10px;margin-bottom:10px;">
					<li style="margin-bottom:3px"><a class="bg-primary" href="/questions/new">質問投稿</a></li>
					<li><a class="bg-primary" href="/questions/users/1135">マイ質問
					
					</a>
					</li>
				</ul>
			</li>
				<li class="dropdown">
				<a class="lead bg-primary" href="/userSearch" >
					<span aria-hidden="true" class="glyphicon glyphicon-search"></span>
					<span> ユーザー検索</span>
				</a>
			</li>
			</ul>
			<ul class="nav nav-pills nav-stacked dropup" style="margin-top: 40px;">
				<li class="dropdown" >
					<a aria-expanded="false" class="lead bg-primary dropdown-toggle" data-toggle="dropdown">
						<span aria-hidden="true" class="glyphicon glyphicon-user"></span>
						
						<span>野口佳純</span>
					</a>
					<ul class="dropdown-menu">
						<li></li>
						<li><a href="/user_profiles/1135">プロフィール</a></li>
						<li><a data-confirm="パスワードを変更しますか？一旦、ログアウトします。" href="/logout_password_resets">パスワード変更</a></li>
						<li><a data-toggle="modal" data-target="#new_inquiry" href="#">お問い合わせ</a></li>
						<li>
							<form class="logout_link" action="/logout" name="logout1" method="post"><input type="hidden" name="_csrf" value="0fb384a8-429e-4bb7-9de1-974b3d647fcd"/>
								<a class="logout_link" rel="nofollow" data-method="delete" href="javascript:logout1.submit()">ログアウト</a>
                   			</form>
						</li>	
					</ul>
				</li>
			</ul>
		</div>
	</div>
			</header>
			<div class="visible-xs-block">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" data-target="#navHeader" data-toggle="collapse" type="button">
					<span class="sr-only">メニュー</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand navbar-brand-center" href="/">Dash</a>
			</div>
			<div class="collapse navbar-collapse" id="navHeader">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
				<a aria-expanded="false" class="lead bg-primary dropdown-toggle" data-toggle="dropdown">
					<span aria-hidden="true" class="glyphicon glyphicon-th-list"></span>
					<span> 月報</span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="/monthly_reports">トップ</a></li>
					<li>
						
						<a href="/monthly_reports/edit">月報登録</a>
					</li>
					<li><a href="/monthly_reports/users/1135">マイ月報</a></li>
				</ul>
			</li>
					<li class="dropdown">
				<a aria-expanded="false" class="lead bg-primary dropdown-toggle" data-toggle="dropdown">
					<span aria-hidden="true" class="glyphicon glyphicon-th-list"></span>
					<span> ブログ</span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="/articles">トップ</a></li>
					<li><a href="/articles/new">新規投稿</a></li>
					<li><a href="/articles/users/1135">マイブログ</a></li>
					<li><a href="/articles/users-favorite/1135">お気に入りブログ</a></li>		
				</ul>
			</li>
					<li class="dropdown">
				<a aria-expanded="false" class="lead bg-primary dropdown-toggle" data-toggle="dropdown">
					<span aria-hidden="true" class="glyphicon glyphicon-th-list"></span>
					<span> Q&A</span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="/questions">トップ</a></li>
					<li><a href="/questions/new">質問投稿</a></li>
					<li><a href="/questions/users/1135">マイ質問
					
					</a></li>		
				</ul>
			</li>
					<li class="dropdown">
				<a class="lead bg-primary" href="/userSearch">
					<span aria-hidden="true" class="glyphicon glyphicon-search"> ユーザー検索</span>
				</a>
			</li>
					<li class="dropdown">
						<a aria-expanded="false" class="lead bg-primary dropdown-toggle" data-toggle="dropdown">
							<span aria-hidden="true" class="glyphicon glyphicon-user"></span>
							
							<span>野口佳純</span>
						</a>
						<ul class="dropdown-menu">
							<li></li>
							<li><a href="/user_profiles/1135">プロフィール</a></li>
							<li><a data-confirm="パスワードを変更しますか？一旦、ログアウトします。" href="/logout_password_resets">パスワード変更</a></li>
							<li><a data-toggle="modal" data-target="#new_inquiry" href="#">お問い合わせ</a></li>
							<li>
								<form class="logout_link" action="/logout" name="logout2" method="post"><input type="hidden" name="_csrf" value="0fb384a8-429e-4bb7-9de1-974b3d647fcd"/>
									<a class="logout_link" rel="nofollow" data-method="delete" href="javascript:logout2.submit()">ログアウト</a>
        		           		</form>
							</li>	
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</div>
			<!-- 		menuここまで  -->

			<!-- 		問い合わせフォームmodal -->
			<form class="modal fade new-inquiry" id="new_inquiry" name="new_inquiry" action="/inquiries" accept-charset="UTF-8" data-remote="true" method="post"><input type="hidden" name="_csrf" value="0fb384a8-429e-4bb7-9de1-974b3d647fcd"/>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3>お問い合わせフォーム</h3>
					<p>お問い合わせや不具合に関する報告、要望等を投稿してください。(1000文字以内)</p>
				</div>
				<div class="modal-body">
					<textarea rows="8" name="inquiry[body]" id="inquiry_body"></textarea>
					<div id="inquiry-error">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal" id="inquiry_form_close">閉じる</button>
					<button name="button" type="submit" class="btn btn-success" data-disable-with="投稿中..." id="inquiry_send">投稿</button>
				</div>
			</div>
		</div>
	</form>
			<!-- 		問い合わせフォームmodalここまで -->
				
			<div class="col-sm-8 col-sm-offset-3">
				<div class="page-header">
					<h1>
					    <span class="glyphicon glyphicon-user"></span>
                        
						<a href="/user_profiles/1373" class="text-profile-link">堀尾洋輔</a>
					</h1>
				</div>
				
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading monthly-report-panel-header">
							<div class="panel-title row">
								<div class="col-xs-2">
									
								</div>
								<div class="col-xs-8 monthly-report-panel-date">
									<span class="label label-success monthly-report-status">登録済</span>
									
									<span>2023年05月の月報</span>
								</div>
								<div class="col-xs-2">
									
								</div>
							</div>
						</div>
						<div class="panel-body">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-3 control-label">今月のアサイン状況</label>
									<div class="col-sm-9 form-control-static btn-group">
										
										<a class="btn btn-default none-pointer">待機中</a>
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">プロジェクト概要</label>
									<div class="col-sm-9 form-control-static">
										<div class="markdown-view">
											<textarea class="hidden">## CockPadにおけるレシピタイトルを用いた曖昧文章検索システムの開発

内容としてはCockPadからレシピのタイトルデータを大量にスクレイピングし、ユーザの入力(query)を元にDBに保存しているタイトルから類似度の高い上位k個を表示するというシステム
5月はデータの収集とアノテーション, モデルの作成、学習、API化を行った。

## GCPを用いたリアルタイム分析
GCPの各種サービスを用いて一週間に一回気象庁の気温データをスクレイピングしてきて次の一週間の気温を予測するというアーキテクチャを構築した。

## StanfordのMOC &quot;NLP with DeepLeaning&quot;の受講および翻訳記事の投稿</textarea>
											<div class="markdown-body"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">使用した技術</label>
									<div class="col-sm-9 form-control-static">
										<div id="report-tag-list" class="tag-list"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">担当した工程</label>
									<div class="col-sm-9 form-control-static btn-group">
										<a class="btn btn-default none-pointer">要件定義</a>
										<a class="btn btn-default none-pointer">設計</a>
										<a class="btn btn-default none-pointer">実装</a>
										
										
										
										
										<a class="btn btn-default none-pointer">構築</a>
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">業務内容</label>
									<div class="col-sm-9 form-control-static">
										<div class="markdown-view">
											<textarea class="hidden">## CockPadにおけるレシピタイトルを用いた曖昧文章検索システムの開発
### 基盤部分
GKEにAPI化したコンテナを載せてCloud Runを用いてデプロイする予定
(コンテナ作成に一生苦しんでおります、、)
パッケージ管理にはpoetryを用いています。

### DB
PineconeというMLしかつかわんやろ!!みたいなベクトルデータベースを用いています。
ただ、無料枠だとベクトルデータの種類(index)を一種類しか入れれないことに加えて、DB容量が2MBかつデータ数が1000までという制限があるので一通り作り終えたらBigTableに乗り換えようか検討中
ただ、文章の類似度検索がめちゃめちゃ高速でできるのでできれば使いたいところ

### API化
FastAPIを用いてAPI化した
学習コストの低さにびっくり、簡単にAPIが作成できた上にUIまで用意してくれている優れもの
ゆくゆくはちゃんとUI部分までこだわってやるのもありかな

### モデル部分
正直ここが一番楽しかった。
ベースは類似文章検索タスクのデファクトスタンダードであるSentenceBERTを用いた。正直LLMを用いても良かったのだがコストの高さの割にオリジナリティを出すのが難しかったのでやめた。
今回僕が用いたモデルとしては[AugSBERT](https://arxiv.org/pdf/2010.08240.pdf)というSentenceBERTの拡張版で反教師あり学習を用いたSBERTモデルです。
このモデルの特徴は話すと長くなるので一言で言うと、機械学習においてだるい作業の一つであるAnnotationのコストが下げれるよ!っていうモデルです
まあ、あと学習データのドメインに依存しないとかいろいろありますが、、
論文実装は終わって類似度のscore算出部分もうちょい工夫したいなってところまで行ったので一旦止めてAPI化しました

テキストの概要ですみません(~~アーキテクチャ図をつくのがめんどくさかった、、~~)

## GCPを用いたリアルタイム分析
シンプルなリアルタイム分析なのですが
モデル作成に用いたAutoMLの時系列予測モデルがデプロイ非対応だったので、データ取得だけリアルタイムですね
これについてはSeleniumをGCP上で動かすのが一番苦労しました。
とくに面白みはないですね、、、
これに関してはアーキテクチャ図書いているのですが、ローカルの画像が載せれないのでやめました、、。</textarea>
											<div class="markdown-body"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">今月の目標</label>
									<div class="col-sm-9 form-control-static">
										<div class="markdown-view">
											<textarea class="hidden"></textarea>
											<div class="markdown-body"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">今月の振り返り</label>
									<div class="col-sm-9 form-control-static">
										<div class="markdown-view">
											<textarea class="hidden">比較的順調な月であったかなと
Stanfordの講義も毎週進めれていたし、GCPの学習も比較的早く終わったので
アサインされている組(土曜組は除く)と会っていないのでみんな元気かなと思っております
</textarea>
											<div class="markdown-body"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">来月の目標</label>
									<div class="col-sm-9 form-control-static">
									<div class="markdown-view">
											<textarea class="hidden">#### 1. とりあえず検索システム完成させる
#### 2.次の学習課題の設定を行う
#### 3.そろそろアサイン決めたいですね</textarea>
											<div class="markdown-body"></div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div id="monthly-report-like-btn">
					<div class="like-btn">
						<span class="hidden" id="login-user-name">野口佳純</span>
						<span role="button" id="like-button">いいね！</span>
					</div>
					<div class="like-count">
						<strong><a id="count-current-like1" class="text-info" data-toggle="modal" data-target="#like-user-modal" href="">2</a></strong>
					</div>
					<div class="modal fade" id="like-user-modal" tabindex="-1">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header-like">
									<h4 class="modal-title text-center">
										<span id="count-current-like2">2</span>人がいいね！と言っています
									</h4>
								</div>
								<div class="modal-body">
									<div class="list-group" id="like-users-list">
										<div>
											
											<a  class="list-group-item"
											href="/user_profiles/387">梶田美妃</a>
										</div>
										<div>
											
											<a  class="list-group-item"
											href="/user_profiles/1366">内井祐作</a>
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
				
				
				<div id="comment"></div>
				<h2>コメント</h2>
				<!-- 		直前の処理の完了通知-->
				
				
				
				
				<!-- コメント投稿フォームここから -->
				<div class="markdown-editor">
					<form class="new_monthly_report_comment" action="/monthly_report_comments" accept-charset="UTF-8" method="post"><input type="hidden" name="_csrf" value="0fb384a8-429e-4bb7-9de1-974b3d647fcd"/>
						<input type="hidden" value="3773" name="reportId" />
						<input type="hidden" value="1373" name="reportAuthorId"/>
						<input type="hidden" value="2023-05-01" name="reportTargetMonth"/>
						<ul class="nav nav-tabs">
							<li class="tab-md-write active">
								<a data-toggle="tab" class="text-info" href="#new-comment-write">Write</a>
							</li>
							<li class="tab-md-preview">
								<a data-toggle="tab" class="text-info" href="#new-comment-preview">Preview</a>
							</li>
							<li class="pull-right">
								<button id="commentBtn" name="button" type="submit" class="btn btn-success" data-disable-with="投稿中..." >Comment</button>
							</li>
						</ul>
						<div class="tab-content markdown-content">
							<div class="tab-pane active" id="new-comment-write">
							<!--3000文字以上文字数アラート-->
								<textarea id="commentCheck" rows="5" class="form-control" name="comment" ></textarea>
								<p>
									<a class="text-info" href="https://help.github.com/articles/basic-writing-and-formatting-syntax/" target="_blank">Markdown</a><span>記法が使えます。</span>
								</p>
							</div>
							<div class="tab-pane content-md-preview markdown-body" id="new-comment-preview"></div>
						</div>
					</form>
				</div>
				<!-- コメント投稿フォームここまで -->
				<br><br>
			</div>
          <!-- 削除確認モーダル -->
          <div class="modal fade" id="monthly-report-delete-confirm">
	      	<div class="modal-dialog">
	        	<div class="modal-content">
	            	<div class="modal-header">
	                	<div class="modal-title">月報を削除</div>
	               	</div>
	                <div class="modal-body">本当にこの月報を削除しますか?</div>
	                <div class="modal-footer">
	                  	<form id="delete-monthly-report-form" method="post" action="/monthly_reports/delete/3773"><input type="hidden" name="_csrf" value="0fb384a8-429e-4bb7-9de1-974b3d647fcd"/>
	                  		<input type="hidden" name="target_year" value="2023">
						    <input class="btn btn-danger" type="submit" value="はい">
						</form>
	                    <button id="delete-monthly-report-form-cancel" class="btn btn-default" data-dismiss="modal" type="button">閉じる</button>
	                </div>
	             </div>
	         </div>
	       </div>
			<div class="page-footer"></div>
		</div>
	</div>
</body>
</html>