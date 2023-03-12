<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DealLog;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $data['main_menu'] = 'reports';
        $data['child_menu'] = 'chart-list';
        $data['users'] = DB::table('users')->select('id', 'name', 'role', 'status')->where('status', '=', 1)->get();
        return view('reports.chart.index', $data);
    }
    public function getReportByDate($date = null, $user = 0)
    {
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));

        if ($user == 0) {
            $reports = DealLog::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as leads'),
            )
                ->whereYear('deal_logs.created_at', '=', $year)
                ->whereMonth('deal_logs.created_at', '=', $month)
                ->groupBy('date')
                ->get();
        } else {
            $reports = DealLog::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as leads'))
                ->where('handle_by', $user)
                ->whereYear('deal_logs.created_at', '=', $year)
                ->whereMonth('deal_logs.created_at', '=', $month)
                ->groupBy('date')
                ->get();
        }

        foreach ($reports as $key => $value) {
            $value->completed = DealLog::where('status', '=', 3)
                ->where('deal_logs.created_at', 'LIKE', '%' . $value->date . '%')
                ->count();
        }

        return $this->respondWithSuccess('Report data', $reports);
    }
}
