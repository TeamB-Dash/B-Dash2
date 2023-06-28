<x-app-layout>
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
  		var tagNames = {{ $report->tags }};

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
		
				
			<div class="col-sm-8 col-sm-offset-3">
				<div class="page-header">
					<h1>
					    <span class="glyphicon glyphicon-user"></span>
                        
						<a href="/user_profiles/1373" class="text-profile-link">{{ $report->user->name }}</a>
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
									
									<span>{{ $report->target_month->format('Y')}}年{{ $report->target_month->format('m')}}月の月報</span>
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
										
										<a class="btn btn-default none-pointer">
                                            @if ($report->assign == 1)
                                                待機中
                                            @elseif ($report->assign == 2)
                                                アサイン中
                                            @endif
                                        </a>
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">プロジェクト概要</label>
									<div class="col-sm-9 form-control-static">
										<div class="markdown-view">
											<textarea class="hidden">{{ $report->project_summary }}</textarea>
											<div class="markdown-body"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">使用した技術</label>
									<div class="col-sm-9 form-control-static">
										<div id="report-tag-list" class="tag-list">
                                            @foreach ($report->tags as $tag)
                                                {{ $tag->name }}
                                            @endforeach
                                        </div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">担当した工程</label>
									<div class="col-sm-9 form-control-static btn-group">
                                        @if ($report->monthlyWorkingProcesses->process_definition == true)
										<a class="btn btn-default none-pointer">要件定義</a>
                                        @endif
                                        @if ($report->monthlyWorkingProcesses->process_design == true)
                                        <a class="btn btn-default none-pointer">設計</a>
                                        @endif
                                        @if ($report->monthlyWorkingProcesses->process_implementation == true)
                                        <a class="btn btn-default none-pointer">実装</a>
                                        @endif
                                        @if ($report->monthlyWorkingProcesses->process_test == true)
                                        <a class="btn btn-default none-pointer">テスト</a>
                                        @endif
                                        @if ($report->monthlyWorkingProcesses->process_operation == true)
                                        <a class="btn btn-default none-pointer">運用保守</a>
                                        @endif
                                        @if ($report->monthlyWorkingProcesses->process_analysis == true)
                                        <a class="btn btn-default none-pointer">分析</a>
                                        @endif
                                        @if ($report->monthlyWorkingProcesses->process_training == true)
                                        <a class="btn btn-default none-pointer">研修</a>
                                        @endif
                                        @if ($report->monthlyWorkingProcesses->process_structure == true)
                                        <a class="btn btn-default none-pointer">構築</a>
                                        @endif
                                        @if ($report->monthlyWorkingProcesses->process_trouble == true)
                                        <a class="btn btn-default none-pointer">障害対応</a>
                                        @endif
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">業務内容</label>
									<div class="col-sm-9 form-control-static">
										<div class="markdown-view">
											<textarea class="hidden">{{ $report->business_content }}</textarea>
											<div class="markdown-body"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">今月の目標</label>
									<div class="col-sm-9 form-control-static">
										<div class="markdown-view">
											<textarea class="hidden">
												@if(is_null($previousMonthlyReport))
												前月の月報が入力されていません。前月の月報の「来月の目標」が表示されます。
												@else
												{{ $previousMonthlyReport->next_month_goals }}
												@endif
											</textarea>
											<div class="markdown-body"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">今月の振り返り</label>
									<div class="col-sm-9 form-control-static">
										<div class="markdown-view">
											<textarea class="hidden">{{ $report->looking_back }}</textarea>
											<div class="markdown-body"></div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">来月の目標</label>
									<div class="col-sm-9 form-control-static">
									<div class="markdown-view">
											<textarea class="hidden">{{ $report->next_month_goals }}</textarea>
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
						<span class="hidden" id="login-user-name">ログインユーザー</span>
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

				<button
				type="button"
				onclick="location.href='{{ route('monthlyReport.edit',$report->id) }}' "
				class="inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
				style="background-color:rgb(11, 146, 51)"
				data-te-ripple-init
				data-te-ripple-color="light">
				編集する
				</button>
				<form action="{{ route('monthlyReport.destroy',$report->id) }}" method="POST" class="inline-block " >
                @csrf
                @method('DELETE')
                <button
                type="submit"
                class="rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                style="background-color:rgb(241, 45, 45)"
                data-te-ripple-init
                data-te-ripple-color="light"
                onclick="return confirm('本当に削除しますか?')"
                >
                削除する
                </button>
                </form>

			</div>
			<div class="page-footer"></div>
		</div>
	</div>
</body>
</html>
</x-app-layout>