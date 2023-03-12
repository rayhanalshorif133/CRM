<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\Airport;
use App\Models\Deal;
use App\Models\DealLog;
use App\Models\Customer;
use App\Models\Country;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;


class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

    public function index()
    {
        //
        if (auth()->user()->role == 'SuperAdmin') {
            $data = Deal::latest()->paginate(10);
        } else {
            $data = Deal::where('handle_by', auth()->user()->id)->latest()->paginate(10);
        }

        return view('deals.index', [
            'deals' => $data,
            'main_menu' => 'deals',
            'child_menu' => 'index-deal',
            'status' => $this->status
        ]);
    }

    public function pendingDeal()
    {
        $pendingDealList = Deal::where('handle_by', null)->latest()->paginate(20);

        return view('deals.panding', [
            'main_menu' => 'deals',
            'child_menu' => 'pending-deal',
            'deals' => $pendingDealList,
            'status' => $this->status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        return view('deals.create', [
            'customer' => $customer,
            'users' => User::where('role', '!=', 'SuperAdmin')->get(),
            'airlines' => Airline::all(),
            'airports' => Airport::all(),
            'services' => Service::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required',
            'service_id' => 'required',
            'sub_service_id' => '',
            'service_year' => 'required',
            'status' => 'required',
            'customer_status' => '',
            'service_description' => '',
            'next_schedule_date' => 'required',
            'next_schedule_time' => 'required',
            'remarks' => '',
            'handle_by' => '',
            'airline_id' => '',
            'class' => '',
            'price' => '',
            'flight_date' => '',
            'flight_time' => '',
            'depature_airport_id' => '',
            'arrival_airport_id' => '',
            'special_need' => '',
            'ticket_status' => '',
            'hotel_name' => '',
            'hotel_price' => '',
            'check_in_date' => '',
            'check_out_date' => '',
            'total_nights' => '',
            'total_amount' => '',
            'makkah_tour_date' => '',
            'makkah_tour_price' => '',
            'madina_tour_date' => '',
            'hotel_price' => '',
            'responsible_person' => '',
            'responsible_person_mobile' => '',
            'source_of_media' => '',
            'referred_by' => '',
            'promotional_offer' => '',
        ]);

        $deal = Deal::create(array_merge(
            $validated,
            [
                'created_by' => auth()->user()->id,
            ]
        ));

        if ($deal) {
            $dealId = $deal->id;

            DealLog::create(array_merge([
                'deal_id' => $dealId
            ], $validated));

            // Send Notification:Start
            $notificationController = new NotificationController();
            $notificationController->sendNotification($request->handle_by, 'New Deal Assigned', 'You have been assigned a new deal. Please check your dashboard.');
            // Send Notification:End

            return redirect("/deal/$dealId/");
        } else {
            return redirect()->back()->withErrors(['Deal is not saved successfully. Please try again later.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        return view('deals.show', [
            'deal' => $deal,
            'status' => $this->status,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        //
        return view('deals.create', [
            'customer' => $deal->customer,
            'services' => Service::all(),
            'users' => User::where('role', '!=', 'SuperAdmin')->get(),
            'airlines' => Airline::all(),
            'airports' => Airport::all(),
            'services' => Service::all(),
            'deal' => $deal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {
        //
        $validated = $request->validate([
            'customer_id' => 'required',
            'service_id' => 'required',
            'service_year' => 'required',
            'status' => 'required',
            'service_description' => '',
            'next_schedule_date' => 'required',
            'next_schedule_time' => 'required',
            'remarks' => '',
            'handle_by' => '',
            'airline_id' => '',
            'class' => '',
            'price' => '',
            'flight_date' => '',
            'flight_time' => '',
            'depature_airport_id' => '',
            'arrival_airport_id' => '',
            'hotel_name' => '',
            'hotel_price' => '',
            'check_in_date' => '',
            'check_out_date' => '',
            'makkah_tour_date' => '',
            'makkah_tour_price' => '',
            'madina_tour_date' => '',
            'hotel_price' => '',
            'responsible_person' => '',
            'responsible_person_mobile' => '',
            'source_of_media' => '',
            'promotional_offer' => '',
        ]);

        // dump($validated);

        // $result =  $deal->update(array_merge(
        //     $validated,
        //     [
        //         'updated_by' => auth()->user()->id,
        //     ]
        // ));

        $result =  $deal->update($validated);

        if ($result) {
            $dealId = $deal->id;

            DealLog::create(array_merge([
                'deal_id' => $dealId
            ], $validated));


            // Send Notification:Start
            $notificationController = new NotificationController();
            $notificationController->sendNotification($deal->handle_by, 'New Deal Assigned', 'You have been assigned a new deal. Please check your dashboard.');
            // Send Notification:End

            return redirect(route('show-deal', $deal->id));
        } else {
            return redirect()->back()->withError('The information is updated');
        }
    }

    public function getDealTimeLine(Deal $deal)
    {
        $deal_logs = DealLog::with(
            'airline',
            'service',
            'depurture_airport',
            'arrival_airport',
            'customer',
            'handle_by_user',
        )->where('deal_id', $deal->id)->latest()->get();
        // dd($deal->deal_logs);
        return view('deals.timeline', [
            'timelines' => $deal_logs,
            'deal' => $deal,
            'status' => $this->status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        //
    }
}
