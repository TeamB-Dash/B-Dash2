<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
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

    }

    public function store(Request $request) {

    }

    public function show(MonthlyReport $monthlyReport) {

        $report = MonthlyReport::find($monthlyReport->id);

        return view('monthlyReport.show2', compact('report'));
    }

    public function edit(MonthlyReport $monthlyReport) {

    }

    public function update(Request $request, MonthlyReport $monthlyReport) {

    }

    public function destroy(MonthlyReport $monthlyReport) {

    }
}

