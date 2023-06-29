<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\User;
use App\Models\Department;
use App\Models\MonthlyReport;
use App\Models\MonthlyWorkingProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class MonthlyReportController extends Controller
{
    public function index() {

        $reports = MonthlyReport::with(['user', 'tags'])
                            ->whereNotNull('shipped_at')
                            ->orderBy('shipped_at', 'desc')
                            ->paginate(10);

        return view('monthlyReport.top', compact('reports'));
    }

    public function create() {

        return view('monthlyReport.create');
    }

    public function store(Request $request) {

        $workingProcess = new MonthlyWorkingProcess();

        if(isset($request->saveAsDraft)) {
            $report = MonthlyReport::create([
                'user_id' => auth()->user()->id,
                'target_month' => $request->target_month,
                'shipped_at' => null,
                'project_summary' => $request->project_summary,
                'business_content' => $request->business_content,
                'looking_back' => $request->looking_back,
                'next_month_goals' => $request->next_month_goals,
                'comments_count' => 0,
                'likes_count' => 0,
                'assign' => $request->assign,
                'is_deleted' => false
            ]);
            $workingProcess->monthly_report_id = $report->id;

            foreach($request->workingProcess as $process) {
                if($process == 'definition') {
                    $workingProcess->process_definition = true;
                }
                if($process == 'design') {
                    $workingProcess->process_design = true;
                }
                if($process == 'implementation') {
                    $workingProcess->process_implementation = true;
                }
                if($process == 'test') {
                    $workingProcess->process_test = true;
                }
                if($process == 'operation') {
                    $workingProcess->process_operation = true;
                }
                if($process == 'analysis') {
                    $workingProcess->process_analysis = true;
                }
                if($process == 'training') {
                    $workingProcess->process_training = true;
                }
                if($process == 'structure') {
                    $workingProcess->process_structure = true;
                }
                if($process == 'trouble') {
                    $workingProcess->process_trouble = true;
                }
            }
        } else if(isset($request->create)) {
            $report = MonthlyReport::create([
                'user_id' => auth()->user()->id,
                'target_month' => $request->target_month,
                'shipped_at' => Carbon::now()->format('Y/m/d H:i:s'),
                'project_summary' => $request->project_summary,
                'business_content' => $request->business_content,
                'looking_back' => $request->looking_back,
                'next_month_goals' => $request->next_month_goals,
                'comments_count' => 0,
                'likes_count' => 0,
                'assign' => $request->assign,
                'is_deleted' => false
            ]);
            $workingProcess->monthly_report_id = $report->id;

            foreach($request->workingProcess as $process) {
                if($process == 'definition') {
                    $workingProcess->process_definition = true;
                }
                if($process == 'design') {
                    $workingProcess->process_design = true;
                }
                if($process == 'implementation') {
                    $workingProcess->process_implementation = true;
                }
                if($process == 'test') {
                    $workingProcess->process_test = true;
                }
                if($process == 'operation') {
                    $workingProcess->process_operation = true;
                }
                if($process == 'analysis') {
                    $workingProcess->process_analysis = true;
                }
                if($process == 'training') {
                    $workingProcess->process_training = true;
                }
                if($process == 'structure') {
                    $workingProcess->process_structure = true;
                }
                if($process == 'trouble') {
                    $workingProcess->process_trouble = true;
                }
            }
        }

        $tags = [];

            foreach($request->tags as $tag){
                $tagInstance = Tag::firstOrCreate(['name' => $tag]);
                $tags[] = $tagInstance->id;
            }
            // dd($tags);

            $report->tags()->sync($tags);

        $workingProcess->save();

        return redirect()->route('monthlyReport.index');
    }

    public function show(MonthlyReport $monthlyReport) {

        $report = MonthlyReport::find($monthlyReport->id);
        $userId = $monthlyReport->user_id;

        // 1. 月報情報を取得
        // 2. target_monthカラムのデータをもとにCarbon::parseでdatetime型に整形。月初を取得後、文字列に
        // 3. whereDateでtarge_monthが同じデータを引っ張ってきて取得（getはコレクション型/firstで1件取得。2行目のtoDateStringはなくてもいけるかも...?）
        $monthlyReport = MonthlyReport::where('user_id', $userId)->first();
        $fromDate = Carbon::parse($monthlyReport->target_month)->subMonthWithNoOverflow(1)->startOfMonth()->toDateString();
        $previousMonthlyReport = MonthlyReport::where('user_id',$userId)->whereDate('target_month','=',$fromDate)->first();

        // dd($previousMonthlyReport);

        return view('monthlyReport.show2', compact('report', 'previousMonthlyReport'));
    }

    public function edit(MonthlyReport $monthlyReport) {

    }

    public function update(Request $request, MonthlyReport $monthlyReport) {

    }

    public function destroy(MonthlyReport $monthlyReport) {

    }
}

