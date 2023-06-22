
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8" />
	<meta content="IE=edge" http-equiv="X-UA-Compatible" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Dash</title>
	<link rel="stylesheet" media="all" href="/css/side_header.css" />
	<link rel="stylesheet" media="all" href="/css/template.css"/>
	<link rel="stylesheet" media="all" href="/css/monthly_report/register-monthly-report.css"/>
	<link rel="stylesheet" href="/css/header-profile.css" />
	<script src="/js/template.js"></script>
	<script src="/js/common/inquiry.js"></script>
	<script src="/js/monthly_report/register-monthly-report.js"></script>
	<!-- <script src="../../static/js/article/form.js" th:src="@{/js/article/form.js}"></script> -->
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
			
  			var refresh_tags_input = function(self) {
    			var input = $('#monthly_report_tags_input');
    			(typeof(input) == undefined) ? null : input.val(self.getTags());
 			 }
  			
  			var selectedTags = [  ];
  			var allTags = [ "C","C++","C#","Bash","Java","Ruby","PHP","Scala","Swift","Objective-C","Android","Perl","Python","Haskell","Coldfusion","Brainfuck","Whitespace","JavaScript","jQuery","AngularJS","CoffeeScript","TypeScript","Node.js","MySQL","PostgreSQL","Oracle","SQLite","PL/SQL","Git","Subversion","Struts","Seasar2","Spring","Ruby on Rails","Sinatra","Laravel","CakePHP","FuelPHP","Zend Framework","Symfony","CodeIgniter","Play","Scalatra","Skinny Framework","Express","Meteor","Django","Mojolicious","GitHub","GitLab","GitBucket","BitBucket","VirtualBox","VMware","KVM","Docker","Heroku","Windows","Mac","Linux","CentOS","Ubuntu","RedHat","VB.NET","SQL Server","IIS","PowerShell","Jenkins","webpack","Slack","React","AWS","Mithril","JUnit","Redis","SourceTree","Apex","SOQL","Aura","Visualforce","Spring Boot","MongoDB","JSP","Servlet","Thymeleaf","Backbone.js","Highcharts","CSS","LESS","HTML","SQL","Bootstrap","DBFlute","JasperReports","Redmine","Talend","ShellScript","shell","astah","Poderosa","サクラエディタ","JIRA","Confluence","ZK","Nginx","Eclipse","SVF","Postman","LINQPad","Atom","Ethna","Backlog","Skype","kintone","TestRail","Velocity","Mako","Solr" ];
  			
		  	var tagger = $('#monthly_report_tags').tags({
      			tagData:  selectedTags,
    	 		suggestions: allTags,
      			suggestOnClick: true,
      			caseInsensitive: true,
      			tagClass: 'btn-success',
      			afterAddingTag: function() {
        			refresh_tags_input(this);
      			},
     		 	afterDeletingTag: function() {
        			refresh_tags_input(this);
      			},
     		 	promptText: "例） Java + \u003cEnter\u003e"
 			});
			refresh_tags_input(tagger);

		 	$('#monthly_report_tags').focusout(function() { this.value = ''; });
		});
</script>
</head>
<body>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
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
							<form class="logout_link" action="/logout" name="logout1" method="post"><input type="hidden" name="_csrf" value="521a7e6e-5be5-4f92-bbb0-ffab8c302449"/>
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
								<form class="logout_link" action="/logout" name="logout2" method="post"><input type="hidden" name="_csrf" value="521a7e6e-5be5-4f92-bbb0-ffab8c302449"/>
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
			<form class="modal fade new-inquiry" id="new_inquiry" name="new_inquiry" action="/inquiries" accept-charset="UTF-8" data-remote="true" method="post"><input type="hidden" name="_csrf" value="521a7e6e-5be5-4f92-bbb0-ffab8c302449"/>
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
			
			<!-- 			編集フォーム -->
			<div class="col-sm-8 col-sm-offset-3">
				<div class="page-header">
					
					
					
				</div>
				
				<!-- 		エラー文ここから -->
				<div>
					
					
					
					
					
					
					
					
				</div>
				
				
				<!-- 		エラー文 ここまで-->
				
				<div class="page-body">
					<div class="text-right">※セッションの有効期限は60分です。</div>
					<div class="page-content well">
						<div id="prev_month_report_copy">
							
						</div>
						<form class="form-horizontal" id="new_monthly_report" action="/monthly_reports/edit" accept-charset="UTF-8" method="post">
                            @csrf
                            <input type="hidden" name="_csrf" value="521a7e6e-5be5-4f92-bbb0-ffab8c302449"/>
							<div class="form-group">
								<label class="control-label col-sm-3" for="monthly_report_target_month">対象月</label>
								<div class="col-sm-9">
									<select name="targetMonth" class="form-control" id="monthly_report_target_month" onchange="submit(this.form)">
										<option value="2023-05-01">2023年05月</option>
										<option value="2023-04-01">2023年04月</option>
										<option value="2023-03-01">2023年03月</option>
										<option value="2023-02-01">2023年02月</option>
										<option value="2023-01-01">2023年01月</option>
										<option value="2022-12-01">2022年12月</option>
										<option value="2022-11-01">2022年11月</option>
										<option value="2022-10-01">2022年10月</option>
										<option value="2022-09-01">2022年09月</option>
										<option value="2022-08-01">2022年08月</option>
										<option value="2022-07-01">2022年07月</option>
									</select>
								</div>
							</div>
						</form>
						<form class="form-horizontal" id="new_monthly_report" action="/monthly_reports/edit/input" accept-charset="UTF-8" method="post"><input type="hidden" name="_csrf" value="521a7e6e-5be5-4f92-bbb0-ffab8c302449"/>
								<div class="form-group">
									<label class="control-label col-sm-3" for="assign">今月のアサイン状況</label>
									<div class="col-sm-9 btn-group" data-toggle="buttons">
  										<label class="btn btn-default">
    										<input type="radio" name="assign" id="assigned" autocomplete="off" value="2">アサイン中
 										</label>
										<label class="btn btn-default">
   											 <input type="radio" name="assign" id="waiting" autocomplete="off" value="1"> 待機中
 										</label>
									</div>
								</div>
								<div class="form-group">
								<div class="control-label col-sm-3" >
									<label for="monthly_report_project_summary">プロジェクト概要</label>
									<a data-toggle="modal" data-target="#article-template-modal" data-type="monthly_report_project_summary">
										<button class="template-btn">テンプレート</button>
									</a>
								</div>
									<div class="col-sm-9">
										<div class="markdown-editor">
											<ul class="nav nav-tabs nav-justified">
												<li class="tab-md-write active"><a data-toggle="tab" class="text-info" href="#project_summary-write">Write</a></li>
												<li class="tab-md-preview"><a data-toggle="tab" class="text-info" href="#project_summary-preview">Preview</a></li>
											</ul>
											<div class="tab-content markdown-content">
												<div class="tab-pane active" id="project_summary-write">
													<textarea rows="15" class="form-control" placeholder="例）# 英語学習アプリ開発" name="projectSummary" id="monthly_report_project_summary"></textarea>
													<p><a class="text-info" href="https://help.github.com/articles/basic-writing-and-formatting-syntax/" target="_blank">Markdown</a><span>記法が使えます。</span></p>
												</div>
												<div class="tab-pane content-md-preview markdown-body" id="project_summary-preview"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">使用した技術</label>
									<div class="col-sm-9">
										<input id="monthly_report_tags_input" type="hidden" name="tags" />
										<div id="monthly_report_tags" class="tag-list"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">担当した工程</label>
									<div class="col-sm-9 btn-group" data-toggle="buttons">
										<label class="btn btn-default">
											<input type="checkbox" name="workingProcess" id="working_process_" value="definition" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
											<span>要件定義</span>
										</label>
										<label class="btn btn-default">
											<input type="checkbox" name="workingProcess" id="working_process_" value="design" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
											<span>設計</span>
										</label>
										<label class="btn btn-default">
											<input type="checkbox" name="workingProcess" id="working_process_" value="implementation" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
											<span>実装</span>
										</label>
										<label class="btn btn-default">
											<input type="checkbox" name="workingProcess" id="working_process_" value="test" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
											<span>テスト</span>
										</label>
										<label class="btn btn-default">
											<input type="checkbox" name="workingProcess" id="working_process_" value="operation" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
											<span>運用保守</span>
										</label>
										<label class="btn btn-default">
											<input type="checkbox" name="workingProcess" id="working_process_" value="analysis" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
											<span>分析</span>
										</label>
										<label class="btn btn-default">
											<input type="checkbox" name="workingProcess" id="working_process_" value="training" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
											<span>研修</span>
										</label>
										<label class="btn btn-default">
											<input type="checkbox" name="workingProcess" id="working_process_" value="structure" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
											<span>構築</span>
										</label>
										<label class="btn btn-default">
											<input type="checkbox" name="workingProcess" id="working_process_" value="trouble" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
											<span>障害対応</span>
										</label>
									</div>
								</div>
								<div class="form-group">
									<div class="control-label col-sm-3" >
										<label for="monthly_report_business_content">業務内容</label>
										<a data-toggle="modal" data-target="#article-template-modal" data-type="monthly_report_business_content">
											<button class="template-btn">テンプレート</button>
										</a>
									</div>
									<div class="col-sm-9">
										<div class="markdown-editor">
											<ul class="nav nav-tabs nav-justified">
												<li class="tab-md-write active"><a data-toggle="tab" class="text-info" href="#business_content-write">Write</a></li>
												<li class="tab-md-preview"><a data-toggle="tab" class="text-info" href="#business_content-preview">Preview</a></li>
											</ul>
											<div class="tab-content markdown-content">
												<div class="tab-pane active" id="business_content-write">
													<textarea rows="15" class="form-control" placeholder=
"例）
#### API仕様を整理する
既に利用しているAPIに関するドキュメントが散らばっている＆欠けている状態だったので、GithubのIssuesに整理したドキュメントを書いた。
進捗 100%" 
														name="businessContent" id="monthly_report_business_content"></textarea>
													<p><a class="text-info" href="https://help.github.com/articles/basic-writing-and-formatting-syntax/" target="_blank">Markdown</a><span>記法が使えます。</span></p>
												</div>
												<div class="tab-pane content-md-preview markdown-body" id="business_content-preview"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="this_month_goals">今月の目標</label>
									<div class="col-sm-9">
										<div class="form-control-static">
											<div class="markdown-view">
												<textarea class="hidden">先月の月報が入力されていません。
先月の月報の「来月の目標」が表示されます。</textarea>
												<div class="markdown-body"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="control-label col-sm-3" >
										<label for="monthly_report_looking_back">今月の振り返り</label>
										<a data-toggle="modal" data-target="#article-template-modal" data-type="monthly_report_looking_back">
											<button class="template-btn">テンプレート</button>
										</a>
									</div>
									<div class="col-sm-9">
										<div class="markdown-editor">
											<ul class="nav nav-tabs nav-justified">
												<li class="tab-md-write active"><a data-toggle="tab" class="text-info" href="#looking_back-write">Write</a></li>
												<li class="tab-md-preview"><a data-toggle="tab" class="text-info" href="#looking_back-preview">Preview</a></li>
											</ul>
											<div class="tab-content markdown-content">
												<div class="tab-pane active" id="looking_back-write">
													<textarea rows="15" class="form-control" placeholder=
"例）
1. ・・・・のでできた。
2. ・・・・なのであまりできなかった。
3. ・・・・のでできなかった。"
													 	name="lookingBack" id="monthly_report_looking_back"></textarea>
													<p><a class="text-info" href="https://help.github.com/articles/basic-writing-and-formatting-syntax/" target="_blank">Markdown</a><span>記法が使えます。</span></p>
												</div>
												<div class="tab-pane content-md-preview markdown-body" id="looking_back-preview"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="control-label col-sm-3">
										<label for="monthly_report_next_month_goals">来月の目標</label>
										<a data-toggle="modal" data-target="#article-template-modal" data-type="monthly_report_next_month_goals">
											<button class="template-btn">テンプレート</button>
										</a>
									</div>
									<div class="col-sm-9">
										<div class="markdown-editor">
											<ul class="nav nav-tabs nav-justified">
												<li class="tab-md-write active"><a data-toggle="tab" class="text-info" href="#next_month_goals-write">Write</a></li>
												<li class="tab-md-preview"><a data-toggle="tab" class="text-info" href="#next_month_goals-preview">Preview</a></li>
											</ul>
										<div class="tab-content markdown-content">
											<div class="tab-pane active" id="next_month_goals-write">
												<textarea rows="15" class="form-control" placeholder=
"例）
1. 
2. 
3."
													 name="nextMonthGoal" id="monthly_report_next_month_goals"></textarea>
												<p><a class="text-info" href="https://help.github.com/articles/basic-writing-and-formatting-syntax/" target="_blank">Markdown</a><span>記法が使えます。</span></p>
											</div>
											<div class="tab-pane content-md-preview markdown-body" id="next_month_goals-preview"></div>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="targetMonth" value="2023-05-01" id="hidden-target-month"/>
							<button name="wip" value="true" type="submit" class="btn btn-lg btn-info btn-block">Save as WIP（下書き保存）</button>
							<button name="wip" value="false" type="submit" class="btn btn-lg btn-success btn-block">Ship（保存して公開）</button>
							
						</form>
					</div>
					
					<!-- ここにモーダルをいれる -->
					<!-- テンプレート一覧モーダル -->
					<div class="modal fade" id="article-template-modal" action="/inquiries" data-remote="true">
						<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header text-center">
								<h4>適用するテンプレートをクリックしてください</h4>
								<p>※登録ボタンを押すと、テンプレート作成画面を表示します</p>
							</div>
							<div class="modal-body">
								
							</div>
							<div class="modal-footer">
								<a id="article-template-btn-container" data-toggle="modal" data-target="#article-template-form">
									<button name="button" type="submit" class="btn btn-success pull-left" data-dismiss="modal">登録</button>
								</a>
								<button class="btn btn-default" data-dismiss="modal" id="inquiry_form_close">閉じる</button>
							</div>
						</div>
					</div>
				</div>
				
				<!-- テンプレート登録モーダル -->
			<div id="article-template-form" class="modal fade" data-remote="true">
			<!-- <form id="article-template-form" class="modal fade" th:action="@{/templates}" data-remote="true" method="post"> -->
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header text-center">
							<h4>テンプレート登録</h4>
							<p>自分のお好みのフォーマットを記入してください</p>
						</div>
						<div class="modal-body">
							<div id="article-template-title">タイトル</div>
						    <input id="template-title-form" class="form-control" type="text"/>
							<div id="article-template-title-error" class="text-danger font-bold"></div>
							<div id="article-template-format">フォーマット文</div>
							<textarea id="template-format-form" rows="8"></textarea>
							<span class="article-template" data-type=""></span>
							<div id="article-template-format-error" class="text-danger font-bold"></div>
						</div>
						<div class="modal-footer">
							<button name="button" type="submit" class="btn btn-success" data-disable-with="投稿中..." id="save-template-btn">登録</button>
							<button id="article-template_form_close" class="btn btn-default" data-dismiss="modal">閉じる</button>
						</div>
					</div>
				</div>
			</div>
			<!-- </form> -->
			
			<!-- テンプレート削除モーダル -->
			<div class="modal fade" id="article-confirm">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <div class="modal-title">テンプレート削除</div>
                  </div>
                  <div class="modal-body">本当にこのテンプレートを削除しますか?</div>
                  <div class="modal-footer">
					<button name="button" type="submit" class="btn btn-danger" data-disable-with="削除中..." id="delete-template-btn">削除</button>
                    <button class="btn btn-default" data-dismiss="modal" type="button">閉じる</button>
                  </div>
                </div>
              </div>
            </div>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>