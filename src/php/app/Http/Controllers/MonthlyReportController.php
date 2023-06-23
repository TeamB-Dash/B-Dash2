<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Department;
use App\Models\MonthlyReport;
use Illuminate\Http\Request;	
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

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

    }

    public function show(MonthlyReport $monthlyReport) {

        $report = MonthlyReport::find($monthlyReport->id);

        // 前月分の月報の情報を取ってくる　月だけを取得する。５を元に新しいカーボンを作成する
        // $reportMonth = new Carbon($report->target_month);
        // // $reportMonth = Carbon::parse($report->target_month)->timezone('Asia/Tokyo');
        // dd($reportMonth);
        // $fromDate = $reportMonth->subMonthWithNoOverflow(1)->firstOfMonth();
        // $endDate = $reportMonth->subMonthWithNoOverflow(1)->endOfMonth();
        // dd($fromDate, $endDate);
        // $previousReport = MonthlyReport::whereBetween('target_month', [$fromDate, $endDate]);
        

        return view('monthlyReport.show2', compact('report'));
    }

    public function edit(MonthlyReport $monthlyReport) {

    }

    public function update(Request $request, MonthlyReport $monthlyReport) {

    }

    public function destroy(MonthlyReport $monthlyReport) {

    }
}

