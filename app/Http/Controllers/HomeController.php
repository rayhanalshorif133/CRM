<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $status = [
        0 => [
            'title' => 'failed',
            'color' => '#dc3545',
        ],
        1 => [
            'title' => 'initial',
            'color' => '#0d6efd',
        ],
        2 => [
            'title' => 'On Proceed',
            'color' => '#0dcaf0',
        ],
        3 => [
            'title' => 'Completed',
            'color' => '#198754',
        ]
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['main_menu'] = 'home';
        $data['today_jobs'] = Deal::with('customer', 'service')->whereDate('next_schedule_date', date('Y-m-d'))->whereTime('next_schedule_time', '>', date('H:i:s'))->where('handle_by', '=', auth()->user()->id)->orderBy('next_schedule_time', 'asc')->get();
        $data['failed_jobs'] = Deal::with('customer', 'service')->whereDate('next_schedule_date', '<=', date('Y-m-d'))->whereTime('next_schedule_time', '<=', date('H:i:s'))->where('handle_by', '=', auth()->user()->id)->orderBy('next_schedule_time', 'asc')->get();
        $data['status'] = $this->status;
        return view('home', $data);
    }
}
