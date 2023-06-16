<?php

namespace App\Http\Controllers;

use App\Models\MonthlyReport;
use Illuminate\Http\Request;	
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MonthlyReportController extends Controller
{
    public function index() {

        // $reports = MonthlyReport::orderBy('created_at', 'desc')->paginate(10);

        // $reports = DB::table('monthly_reports')
        //             ->leftJoin('users', 'monthly_reports.user_id', '=', 'users.id')
        //             ->select('users.*', 'monthly_reports.*')
        //             ->orderBy('monthly_reports.created_at', 'desc')
        //             ->paginate(10);

        $reports = MonthlyReport::select([
            'mr.*',
            'u.*',
        ])
        ->from('monthly_reports as mr')
        ->leftJoin('users as u', function($join) {
            $join->on('mr.user_id', '=', 'u.id');
        })
        ->whereNotNull('mr.shipped_at')
        ->orderBy('mr.shipped_at', 'desc')
        ->paginate(10);

        return view('monthlyReport.top', compact('reports'));
    }

    public function create() {

    }

    public function store(Request $request) {

    }

    public function show(MonthlyReport $monthlyReport) {

    }

    public function edit(MonthlyReport $monthlyReport) {

    }

    public function update(Request $request, MonthlyReport $monthlyReport) {

    }

    public function destroy(MonthlyReport $monthlyReport) {

    }
}

