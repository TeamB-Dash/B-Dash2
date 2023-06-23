<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\User;
use App\Models\Department;
use App\Models\MonthlyReport;
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

        $report = new MonthlyReport();

        $report->target_month = $request->target_month;
        $report->assign = $request->assign;
        $report->project_summary = $request->project_summary;
        $report->business_content = $request->business_content;
        $report->looking_back = $request->looking_back;
        $report->next_month_goals = $request->next_month_goals;
        $report->user_id = auth()->user()->id;

        $tags = [];

            foreach($request->tags as $tag){
                $tagInstance = Tag::firstOrCreate(['name' => $tag]);
                $tags[] = $tagInstance->id;
            }

            $report->tags()->syncWithPivotValues($tags,['is_deleted' => false]);
        
        $report->save();

        return redirect()->route('monthlyReport.create');
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

        // dd($previousMonthlyReport->next_month_goals);
        

        return view('monthlyReport.show2', compact('report', 'previousMonthlyReport'));
    }

    public function edit(MonthlyReport $monthlyReport) {

    }

    public function update(Request $request, MonthlyReport $monthlyReport) {

    }

    public function destroy(MonthlyReport $monthlyReport) {

    }
}

