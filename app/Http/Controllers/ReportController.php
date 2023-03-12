<?php

namespace App\Http\Controllers;

use App\Models\DealLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $data['main_menu'] = 'reports';
        $data['child_menu'] = 'report-list';
        $data['users'] = DB::table('users')->select('id', 'name', 'role', 'status')->where('status', '=', 1)->get();
        return view('reports.index', $data);
    }

    public function getReportByDate($user_id, $date)
    {
        $date = date('Y-m-d', strtotime($date));

        $reports = DealLog::select('*')
            ->where('handle_by', '=', $user_id)
            ->where('deal_logs.created_at', 'LIKE', '%' . $date . '%')
            ->with(
                'service',
                'customer',
                'handle_by_user',
            )
            ->paginate();

        return response()->json($reports);
    }

    public function getReportShow(Request $request)
    {
        $deal_logs = DealLog::with(
            'airline',
            'service',
            'depurture_airport',
            'arrival_airport',
            'customer',
            'handle_by_user',
        )->where('deal_id', $request->id)->first();
        return $this->respondWithSuccess("data", $deal_logs);
    }
}
