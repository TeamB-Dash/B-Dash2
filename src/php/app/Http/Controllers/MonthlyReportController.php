<?php

namespace App\Http\Controllers;

use App\Models\MonthlyReport;
use App\Models\User;
use Illuminate\Http\Request;	
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MonthlyReportController extends Controller
{
    public function index() {

        $reports = MonthlyReport::select([
            'mr.id as mr_id',
            'mr.user_id as mr_user_id',
            'mr.target_month',
            'mr.shipped_at',
            'mr.project_summary',
            'mr.business_content',
            'mr.looking_back',
            'mr.next_month_goals',
            'mr.assign',
            'mr.is_deleted',
            'u.id as user_id',
            'u.name as user_name',
            'u.employee_code',
            'u.entry_date',
            'u.department_id',
            'd.id',
            'd.name as department_name'
        ])
        ->from('monthly_reports as mr')
        ->leftJoin('users as u', function($join) {
            $join->on('mr.user_id', '=', 'u.id');
        })
        ->leftJoin('departments as d', function($join) {
            $join->on('u.department_id', '=', 'd.id');
        })
        ->whereNotNull('mr.shipped_at')
        ->orderBy('mr.shipped_at', 'desc')
        ->paginate(10);

        // $reports = MonthlyReport::orderBy('shipped_at', 'desc')
        //             ->get();



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

