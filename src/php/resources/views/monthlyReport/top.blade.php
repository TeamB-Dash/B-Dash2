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
                        <h1>月報トップ</h1>
                    </div>

                    <div class="page-content">
                        <div class="jumbotron report-searchform">
                            <div class="container">
                                <!--        検索フォームここから -->
                                <form class="form-horizontal accordion-icon" id="monthly_report_search"
                                    action="/monthly_reports" accept-charset="UTF-8" method="GET">
                                    <div class="accordion_title" onclick="formClick()">月報検索</div>
                                    <div class="accordion_form is-open">
                                        <div class="form-group">
                                            <label class="control-label col-xs-2" for="q_user_name_cont">氏名</label>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="search" name="name"
                                                    id="q_user_name_cont" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-2" for="q_target_month_eq">所属</label>
                                            <div class="col-xs-10">
                                                <select class="form-control" name="departmentId" id="q_target_month_eq">
                                                    <option value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-2" for="entry">入社年月</label>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="month" name="entryMonth" id="entry" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-xs-2" for="target_month">対象月</label>
                                            <div class="col-xs-4">
                                                <select class="form-control" name="startTargetMonth" id="start_target_month">
                                                    <option value=""></option>
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
                                                    <option value="2022-06-01">2022年06月</option>
                                                    <option value="2022-05-01">2022年05月</option>
                                                    <option value="2022-04-01">2022年04月</option>
                                                    <option value="2022-03-01">2022年03月</option>
                                                    <option value="2022-02-01">2022年02月</option>
                                                    <option value="2022-01-01">2022年01月</option>
                                                    <option value="2021-12-01">2021年12月</option>
                                                    <option value="2021-11-01">2021年11月</option>
                                                    <option value="2021-10-01">2021年10月</option>
                                                    <option value="2021-09-01">2021年09月</option>
                                                    <option value="2021-08-01">2021年08月</option>
                                                    <option value="2021-07-01">2021年07月</option>
                                                    <option value="2021-06-01">2021年06月</option>
                                                    <option value="2021-05-01">2021年05月</option>
                                                    <option value="2021-04-01">2021年04月</option>
                                                    <option value="2021-03-01">2021年03月</option>
                                                    <option value="2021-02-01">2021年02月</option>
                                                    <option value="2021-01-01">2021年01月</option>
                                                    <option value="2020-12-01">2020年12月</option>
                                                    <option value="2020-11-01">2020年11月</option>
                                                    <option value="2020-10-01">2020年10月</option>
                                                    <option value="2020-09-01">2020年09月</option>
                                                    <option value="2020-08-01">2020年08月</option>
                                                    <option value="2020-07-01">2020年07月</option>
                                                    <option value="2020-06-01">2020年06月</option>
                                                    <option value="2020-05-01">2020年05月</option>
                                                    <option value="2020-04-01">2020年04月</option>
                                                    <option value="2020-03-01">2020年03月</option>
                                                    <option value="2020-02-01">2020年02月</option>
                                                    <option value="2020-01-01">2020年01月</option>
                                                    <option value="2019-12-01">2019年12月</option>
                                                    <option value="2019-11-01">2019年11月</option>
                                                    <option value="2019-10-01">2019年10月</option>
                                                    <option value="2019-09-01">2019年09月</option>
                                                    <option value="2019-08-01">2019年08月</option>
                                                    <option value="2019-07-01">2019年07月</option>
                                                    <option value="2019-06-01">2019年06月</option>
                                                    <option value="2019-05-01">2019年05月</option>
                                                    <option value="2019-04-01">2019年04月</option>
                                                    <option value="2019-03-01">2019年03月</option>
                                                    <option value="2019-02-01">2019年02月</option>
                                                    <option value="2019-01-01">2019年01月</option>
                                                    <option value="2018-12-01">2018年12月</option>
                                                    <option value="2018-11-01">2018年11月</option>
                                                    <option value="2018-10-01">2018年10月</option>
                                                    <option value="2018-09-01">2018年09月</option>
                                                    <option value="2018-08-01">2018年08月</option>
                                                    <option value="2018-07-01">2018年07月</option>
                                                    <option value="2018-06-01">2018年06月</option>
                                                    <option value="2018-05-01">2018年05月</option>
                                                    <option value="2018-04-01">2018年04月</option>
                                                    <option value="2018-03-01">2018年03月</option>
                                                    <option value="2018-02-01">2018年02月</option>
                                                    <option value="2018-01-01">2018年01月</option>
                                                    <option value="2017-12-01">2017年12月</option>
                                                    <option value="2017-11-01">2017年11月</option>
                                                    <option value="2017-10-01">2017年10月</option>
                                                    <option value="2017-09-01">2017年09月</option>
                                                    <option value="2017-08-01">2017年08月</option>
                                                    <option value="2017-07-01">2017年07月</option>
                                                    <option value="2017-06-01">2017年06月</option>
                                                    <option value="2017-05-01">2017年05月</option>
                                                    <option value="2017-04-01">2017年04月</option>
                                                    <option value="2017-03-01">2017年03月</option>
                                                    <option value="2017-02-01">2017年02月</option>
                                                    <option value="2017-01-01">2017年01月</option>
                                                    <option value="2016-12-01">2016年12月</option>
                                                    <option value="2016-11-01">2016年11月</option>
                                                    <option value="2016-10-01">2016年10月</option>
                                                    <option value="2016-09-01">2016年09月</option>
                                                </select>
                                            </div>
                                            <span class="col-xs-1">~</span>
                                            <div class="col-xs-4">
                                                <select class="form-control" name="endTargetMonth" id="end_target_month">
                                                    <option value=""></option>
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
                                                    <option value="2022-06-01">2022年06月</option>
                                                    <option value="2022-05-01">2022年05月</option>
                                                    <option value="2022-04-01">2022年04月</option>
                                                    <option value="2022-03-01">2022年03月</option>
                                                    <option value="2022-02-01">2022年02月</option>
                                                    <option value="2022-01-01">2022年01月</option>
                                                    <option value="2021-12-01">2021年12月</option>
                                                    <option value="2021-11-01">2021年11月</option>
                                                    <option value="2021-10-01">2021年10月</option>
                                                    <option value="2021-09-01">2021年09月</option>
                                                    <option value="2021-08-01">2021年08月</option>
                                                    <option value="2021-07-01">2021年07月</option>
                                                    <option value="2021-06-01">2021年06月</option>
                                                    <option value="2021-05-01">2021年05月</option>
                                                    <option value="2021-04-01">2021年04月</option>
                                                    <option value="2021-03-01">2021年03月</option>
                                                    <option value="2021-02-01">2021年02月</option>
                                                    <option value="2021-01-01">2021年01月</option>
                                                    <option value="2020-12-01">2020年12月</option>
                                                    <option value="2020-11-01">2020年11月</option>
                                                    <option value="2020-10-01">2020年10月</option>
                                                    <option value="2020-09-01">2020年09月</option>
                                                    <option value="2020-08-01">2020年08月</option>
                                                    <option value="2020-07-01">2020年07月</option>
                                                    <option value="2020-06-01">2020年06月</option>
                                                    <option value="2020-05-01">2020年05月</option>
                                                    <option value="2020-04-01">2020年04月</option>
                                                    <option value="2020-03-01">2020年03月</option>
                                                    <option value="2020-02-01">2020年02月</option>
                                                    <option value="2020-01-01">2020年01月</option>
                                                    <option value="2019-12-01">2019年12月</option>
                                                    <option value="2019-11-01">2019年11月</option>
                                                    <option value="2019-10-01">2019年10月</option>
                                                    <option value="2019-09-01">2019年09月</option>
                                                    <option value="2019-08-01">2019年08月</option>
                                                    <option value="2019-07-01">2019年07月</option>
                                                    <option value="2019-06-01">2019年06月</option>
                                                    <option value="2019-05-01">2019年05月</option>
                                                    <option value="2019-04-01">2019年04月</option>
                                                    <option value="2019-03-01">2019年03月</option>
                                                    <option value="2019-02-01">2019年02月</option>
                                                    <option value="2019-01-01">2019年01月</option>
                                                    <option value="2018-12-01">2018年12月</option>
                                                    <option value="2018-11-01">2018年11月</option>
                                                    <option value="2018-10-01">2018年10月</option>
                                                    <option value="2018-09-01">2018年09月</option>
                                                    <option value="2018-08-01">2018年08月</option>
                                                    <option value="2018-07-01">2018年07月</option>
                                                    <option value="2018-06-01">2018年06月</option>
                                                    <option value="2018-05-01">2018年05月</option>
                                                    <option value="2018-04-01">2018年04月</option>
                                                    <option value="2018-03-01">2018年03月</option>
                                                    <option value="2018-02-01">2018年02月</option>
                                                    <option value="2018-01-01">2018年01月</option>
                                                    <option value="2017-12-01">2017年12月</option>
                                                    <option value="2017-11-01">2017年11月</option>
                                                    <option value="2017-10-01">2017年10月</option>
                                                    <option value="2017-09-01">2017年09月</option>
                                                    <option value="2017-08-01">2017年08月</option>
                                                    <option value="2017-07-01">2017年07月</option>
                                                    <option value="2017-06-01">2017年06月</option>
                                                    <option value="2017-05-01">2017年05月</option>
                                                    <option value="2017-04-01">2017年04月</option>
                                                    <option value="2017-03-01">2017年03月</option>
                                                    <option value="2017-02-01">2017年02月</option>
                                                    <option value="2017-01-01">2017年01月</option>
                                                    <option value="2016-12-01">2016年12月</option>
                                                    <option value="2016-11-01">2016年11月</option>
                                                    <option value="2016-10-01">2016年10月</option>
                                                    <option value="2016-09-01">2016年09月</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-2">使用した技術</label>
                                            <div class="col-xs-10">
                                                <input id="monthly_report_tags_input" type="hidden" name="tags" />
                                                <div id="monthly_report_tags" class="tag-list"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-2">投稿月の状況</label>
                                            <div class="col-xs-10 btn-group btn-group-sm" data-toggle="buttons">
                                                <label class="btn btn-default">
                                                    <input type="radio" name="assign" value="2" id="assign1">
                                                    <span>アサイン中</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="radio" name="assign" value="1" id="assign2">
                                                    <span>待機中</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="radio" name="assign" value="" id="assign3">
                                                    <span>指定なし</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-2"
                                                for="q_monthly_working_process">担当した工程</label>
                                            <div class="col-xs-10 btn-group btn-group-sm" data-toggle="buttons">
                                                <label class="btn btn-default">
                                                    <input type="checkbox" name="workingProcess" id="working_process_" value="definition"
                                                        autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
                                                    <span>要件定義</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="checkbox" name="workingProcess" id="working_process_" value="design"
                                                        autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
                                                    <span>設計</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="checkbox" name="workingProcess" id="working_process_"
                                                        value="implementation" autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
                                                    <span>実装</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="checkbox" name="workingProcess" id="working_process_" value="test"
                                                        autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
                                                    <span>テスト</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="checkbox" name="workingProcess" id="working_process_" value="operation"
                                                        autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
                                                    <span>運用保守</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="checkbox" name="workingProcess" id="working_process_" value="analysis"
                                                        autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
                                                    <span>分析</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="checkbox" name="workingProcess" id="working_process_" value="training"
                                                        autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
                                                    <span>研修</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="checkbox" name="workingProcess" id="working_process_" value="structure"
                                                        autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
                                                    <span>構築</span>
                                                </label>
                                                <label class="btn btn-default">
                                                    <input type="checkbox" name="workingProcess" id="working_process_" value="trouble"
                                                        autocomplete="off" /><input type="hidden" name="_workingProcess" value="on"/>
                                                    <span>障害対応</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-10 col-xs-offset-2">
                                                <button name="searching" value="true" type="submit"
                                                    class="btn btn-default">検索</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!--        検索フォームここまで -->
                            </div>
                        </div>
                    </div>
                    <div class="page-content">
                        <h3>最新の月報一覧</h3>
                        
                        
                        
                        <div id="report_index">
                            <div class="list-group monthly-report-index">

                                    @foreach ($reports as $report)
                                    <a class="list-group-item" href="{{ route('monthlyReport.show', $report)}}">
                                        <span>【</span>
                                        <span class="tag label label-success">{{ $report->user->department->name }}</span>
                                        <span>{{ $report->user->entry_date}}入社</span>
                                        <span>】</span>
                                        <span class="glyphicon glyphicon-user"></span>
                                        
                                        <span>{{ $report->user->name }}</span>
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
                        
                        <div class="page-footer"></div>
                    </div>
                </div>
                <!-- side content -->
                {{-- <div id="sideContent" class="col-sm-3">
                    <div class="m-search sticky">
                        <h4>いいね！獲得ランキング</h4>
                        <h5>対象月：2022年12月～2023年5月</h5>
                        <br>
                        
                    <div>
                            <p>
                                <span>1.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/660/吉村智矢">吉村智矢</a></span>
                                <span> 👍76</span>
                            </p>
                            <p>
                                <span>2.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/1160/瀧量子">瀧量子</a></span>
                                <span> 👍60</span>
                            </p>
                            <p>
                                <span>3.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/884/鹿野活弥">鹿野活弥</a></span>
                                <span> 👍54</span>
                            </p>
                            <p>
                                <span>4.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/887/児玉桃子">児玉桃子</a></span>
                                <span> 👍51</span>
                            </p>
                            <p>
                                <span>5.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/1391/貝原将星">貝原将星</a></span>
                                <span> 👍50</span>
                            </p>
                            <p>
                                <span>6.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/926/光永皓香">光永皓香</a></span>
                                <span> 👍49</span>
                            </p>
                            <p>
                                <span>7.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/704/水谷公陽">水谷公陽</a></span>
                                <span> 👍48</span>
                            </p>
                            <p>
                                <span>8.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/1481/横山翔一">横山翔一</a></span>
                                <span> 👍47</span>
                            </p>
                            <p>
                                <span>9.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/1059/鳥羽椋也">鳥羽椋也</a></span>
                                <span> 👍46</span>
                            </p>
                            <p>
                                <span>10.</span>
                                <span> 👤</span>
                                <span><a class="likeRankUserName" href="/monthly_reports/search/1091/石上紗己">石上紗己</a></span>
                                <span> 👍45</span>
                            </p>
                            <br>
                    </div>
                    </div>
                </div> --}}
            </div>
        </div>
</body>
</x-app-layout>