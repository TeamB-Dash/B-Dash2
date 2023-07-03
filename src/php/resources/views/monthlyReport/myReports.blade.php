<x-app-layout>
    <!DOCTYPE html>
    <html lang="ja">
    
    <head>
        <meta charset="utf-8" />
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>Dash</title>
        <link rel="stylesheet" media="all" href="{{ asset('/assets/css/side_header.css') }}" />
        <link rel="stylesheet" media="all" href="{{ asset('/assets/css/template.css') }}" />
        <link rel="stylesheet" media="all" href="{{ asset('/assets/css/monthly_report/monthly-report-list.css') }}" />
        <link rel="stylesheet" media="all" href="{{ asset('/assets/css/monthly_report/user-list.css') }}" />
        <link rel="stylesheet" href="{{ asset('/css/header-profile.css') }}" />
        <script src="{{ asset('/js/template.js') }}"></script>
        <script src="{{ asset('/js/common/inquiry.js') }}"></script>
        <script src="{{ asset('/js/monthly_report/list.js') }}"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/img/favicon/favicon-32x32.png"
            sizes="32x32">
        <link rel="icon" type="image/png" href="/img/favicon/favicon-16x16.png"
            sizes="16x16">
        <link rel="manifest" href="/img/favicon/manifest.json">
        <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg"
            color="#dd4814">
        <link rel="shortcut icon" href="/img/favicon/favicon.ico">
        <meta name="apple-mobile-web-app-title" content="Dash">
        <meta name="application-name" content="Dash">
        <meta name="msapplication-config" content="../../static/img/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <script>
            $(function () {
                var refresh_tags_input = function (self) {
                    var input = $('#monthly_report_tags_input');
                    (typeof (input) == undefined) ? null : input.val(self.getTags());
                }
    
                var selectedTags = [  ];
            var tagNames = [ "C","C++","C#","Bash","Java","Ruby","PHP","Scala","Swift","Objective-C","Android","Perl","Python","Haskell","Coldfusion","Brainfuck","Whitespace","JavaScript","jQuery","AngularJS","CoffeeScript","TypeScript","Node.js","MySQL","PostgreSQL","Oracle","SQLite","PL/SQL","Git","Subversion","Struts","Seasar2","Spring","Ruby on Rails","Sinatra","Laravel","CakePHP","FuelPHP","Zend Framework","Symfony","CodeIgniter","Play","Scalatra","Skinny Framework","Express","Meteor","Django","Mojolicious","GitHub","GitLab","GitBucket","BitBucket","VirtualBox","VMware","KVM","Docker","Heroku","Windows","Mac","Linux","CentOS","Ubuntu","RedHat","VB.NET","SQL Server","IIS","PowerShell","Jenkins","webpack","Slack","React","AWS","Mithril","JUnit","Redis","SourceTree","Apex","SOQL","Aura","Visualforce","Spring Boot","MongoDB","JSP","Servlet","Thymeleaf","Backbone.js","Highcharts","CSS","LESS","HTML","SQL","Bootstrap","DBFlute","JasperReports","Redmine","Talend","ShellScript","shell","astah","Poderosa","サクラエディタ","JIRA","Confluence","ZK","Nginx","Eclipse","SVF","Postman","LINQPad","Atom","Ethna","Backlog","Skype","kintone","TestRail","Velocity","Mako","Solr" ];
    
            var tagger = $('#monthly_report_tags').tags({
                tagData: selectedTags,
                suggestions: tagNames,
                suggestOnClick: true,
                caseInsensitive: true,
                tagClass: 'btn-success',
                afterAddingTag: function () {
                    refresh_tags_input(this);
                },
                afterDeletingTag: function () {
                    refresh_tags_input(this);
                },
                promptText: "例） Java + \u003cEnter\u003e"
            });
            refresh_tags_input(tagger);
    
            $('#monthly_report_tags').focusout(function () { this.value = ''; });
        });
    
            // ---------------アコーディオンフォーム実装-----------------------
            // 要素を非表示にする関数
            const slideUp = function (content) {
                content.classList.remove("is-open");
    
            };
            // 要素表示する関数
            const slideDown = function (content) {
                content.classList.add("is-open");
            };
    
            // 要素を交互に表示/非表示にする関数
            const slideToggle = function (content) {
                if (window.getComputedStyle(content).display === "none") {
                    var openStatusDic = "開く";
                    sessionStorage.setItem('openStatusDic',
                        JSON.stringify(openStatusDic));
                    return slideDown(content);
                } else {
                    var openStatusDic = "閉じる";
                    sessionStorage.setItem('openStatusDic',
                        JSON.stringify(openStatusDic));
                    return slideUp(content);
                }
            };
    
            function formClick() {
                const accordion = document.querySelector(".form-horizontal");
                // 'accordion-icon'クラスを付与or削除
                accordion.classList.toggle("accordion-icon");
                // 開閉させる要素を取得
                const content = accordion.querySelector(".accordion_form");
    
                content.display = (content.display === 'none') ? 'block' : 'none';
                // 要素を展開or閉じる
                slideToggle(content);
            }
    
            // ロード時に検索フォーム開閉のsessionがあるか確認
            document.addEventListener("DOMContentLoaded", function (event) {
    
                var itemValue = sessionStorage.getItem('openStatusDic');
                if (itemValue !== null) {
                    openStatusDic = JSON.parse(itemValue);
                    // デフォルトは開いているため、session＝閉じるのときだけ関数実行
                    if (openStatusDic === "閉じる") {
                        formClick();
                    }
                };
            }, false);
        // ---------------アコーディオンフォーム実装ここまで-----------------------
        </script>
    </head>
    
    <body>
        <div class="site-body container-fluid">
            <div class="site-container row">
    
                <div class="flex-body">
                    <div class="ml-par20 col-sm-6">
                        <div class="page-header">
                            <h1>{{$user->name}}さんの月報一覧</h1>
                        </div>
    
                        <div class="page-content">
                            <div class="jumbotron report-searchform">
                                <div class="container">
                                </div>
                            </div>
                        </div>
                        <div class="page-content">
                            {{-- <h3>最新の月報一覧</h3> --}}
                        
                            <div class="w-full">
                                <button
                                type="button"
                                onclick="location.href='{{ route('monthlyReport.showMyDraftReports', Auth::user()->id) }}' "
                                class="inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                                style="background-color:rgb(178, 106, 245)"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                下書き中の月報一覧へ
                                </button>
                            </div>

                            @if ($reports->count() === 0)
                            <div class="w-full">表示する月報はありません</div>
                            @else
                            
                            <div id="report_index">
                                <div class="list-group monthly-report-index">
    
                                        @foreach ($reports as $report)
                                        <a class="list-group-item" href="{{ route('monthlyReport.show', $report)}}">
                                            {{-- <span>【</span>
                                            <span class="tag label label-success">{{ $report->user->department->name }}</span>
                                            <span>{{ $report->user->entry_date}}入社</span>
                                            <span>】</span>
                                            <span class="glyphicon glyphicon-user"></span>
                                            
                                            <span>{{ $report->user->name }}</span> --}}
                                            <span> - {{ $report->target_month->format('Y')}}年{{ $report->target_month->format('m')}}月分</span>
                                            <br class="visible-xs-block" />
                                            <div class="visible-xs-inline">　</div>
                                            <small class="monthly-report-shipped-at text-muted hidden-xs">投稿日: {{ $report->shipped_at->format('Y-m-d') }}</small>
                                            <div class="pull-right">
                                                
                                                @foreach($report->tags as $tag)
                                                <span class="tag label label-success">{{ $tag->name }}</span>
                                                @endforeach
                                                
                                                {{-- <span class="comments_count">
                                                    <span aria-hidden="true" class="glyphicon glyphicon-comment"></span>
                                                    <span>1</span>
                                                </span>
                                                <span class="likes_count">    
                                                    <span aria-hidden="true" class="glyphicon glyphicon-thumbs-up"></span>
                                                    <span>5</span>
                                                </span> --}}
                                            </div>
                                            <!-- プロジェクト概要 10文字以上の場合、9文字目まで表示させて、それ以降は「...」と表示 -->
                                            <h4>{{ Str::limit($report->project_summary, 30, '...') }}</h4>
                                                <!-- それ以外は普通に表示 -->
                                                @endforeach            
                                </div>
                                {{ $reports->links() }}
                                @endif
                            
                            <div class="page-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    </x-app-layout>