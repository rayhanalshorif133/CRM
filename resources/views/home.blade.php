@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-2">
            <div class="card card-info">
                <div class="card-header text-bold">{{ __('Today Upcomming Jobs') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <div class="timeline">
                        @foreach($today_jobs as $timeline)
                        <div class="time-label">
                            <span class="bg-info">Meeting {{$loop->iteration}}</span>
                        </div>
    
                        <div>
                            <i class="fas fa-comments bg-success"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i>
                                    @php
                                    $datetime2 = new DateTime();
                                    $datetime1 = new DateTime($timeline->next_schedule_date.' '.$timeline->next_schedule_time);
                                    $interval = $datetime1->diff($datetime2);
    
                                    $totalSecondsDiff = $datetime1->getTimestamp() - $datetime2->getTimestamp();
                                    $totalHoursDiff = $totalSecondsDiff/60/60;
                                    $totalYearsDiff = $totalSecondsDiff/60/60/24/365;
                                    $totalMinutesDiff = $totalSecondsDiff/60;
    
                                    if($totalHoursDiff>24)
                                    {
                                    $elapsed = $interval->format('After %a days %h hours');
                                    }
                                    else if($totalMinutesDiff>59)
                                    {
                                    $elapsed = $interval->format('After %h hours %i minutes');
                                    }
                                    else{
                                    $elapsed = $interval->format('After %i minutes');
                                    }
                                    echo $elapsed;
                                    @endphp
                                </span>
                                <h3 style="color: {{$status[$timeline->status]['color']}};" class="timeline-header">
                                    
                                    Meeting with {{$timeline->customer->title}} for {{$timeline->service->name}}
                                    
                                </h3>
                                <div class="timeline-body">
                                    <div>
                                        Remark: {{$timeline->remarks}}
                                    </div>
                                    <div>
                                        Next Schedule:
                                        @php
                                        $date=date_create($timeline->next_schedule_date);
                                        echo date_format($date,"d M Y ");
                                        echo date('h:i A', strtotime($timeline->next_schedule_time));
                                        @endphp
                                    </div>
                                </div>
                                <div class="timeline-footer">
                                    <button onclick="showDetails({{json_encode($timeline)}},{{json_encode($status)}})"
                                        style="cursor: pointer;" class="btn btn-warning btn-sm">View Details</button>
                                    
                                    <a href="/deal/{{$timeline->id}}/edit" class="btn btn-success btn-sm">
                                        Meet Now
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-2">
            <div class="card card-danger">
                <div class="card-header text-bold">{{ __('Failed To Meet The Jobs') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    <div class="timeline">
                        @foreach($failed_jobs as $timeline)
                        <div class="time-label">
                            <span class="bg-danger">Meeting {{$loop->iteration}}</span>
                        </div>
    
                        <div>
                            <i class="fas fa-comments bg-yellow"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i>
                                    @php
                                    $datetime2 = new DateTime();
                                    $datetime1 = new DateTime($timeline->next_schedule_date.' '.$timeline->next_schedule_time);
                                    $interval = $datetime1->diff($datetime2);
    
                                    $totalSecondsDiff = $datetime1->getTimestamp() - $datetime2->getTimestamp();
                                    $totalHoursDiff = $totalSecondsDiff/60/60;
                                    $totalYearsDiff = $totalSecondsDiff/60/60/24/365;
                                    $totalMinutesDiff = $totalSecondsDiff/60;

                                    if($totalYearsDiff>1)
                                    {
                                    $elapsed = "More than 1 Year ago";
                                    }
                                    else if($totalHoursDiff>24)
                                    {
                                    $elapsed = $interval->format('%a days %h hours ago');
                                    }
                                    else if($totalMinutesDiff>59)
                                    {
                                    $elapsed = $interval->format('%h hours ago %i minutes ago');
                                    }
                                    else{
                                    $elapsed = $interval->format('%i minutes ago');
                                    }
                                    echo $elapsed;
                                    @endphp
                                </span>
                                <h3 style="color: {{$status[$timeline->status]['color']}};" class="timeline-header">
                                    
                                    Meeting with {{$timeline->customer->title}} for {{$timeline->service->name}}
                                    
                                </h3>
                                <div class="timeline-body">
                                    <div>
                                        Remark: {{$timeline->remarks}}
                                    </div>
                                    <div>
                                        Next Schedule:
                                        @php
                                        $date=date_create($timeline->next_schedule_date);
                                        echo date_format($date,"d M Y ");
                                        echo date('h:i A', strtotime($timeline->next_schedule_time));
                                        @endphp
                                    </div>
                                </div>
                                <div class="timeline-footer">
                                    <button onclick="showDetails({{json_encode($timeline)}},{{json_encode($status)}})"
                                        style="cursor: pointer;" class="btn btn-warning btn-sm">View Details</button>

                                    <a href="/deal/{{$timeline->id}}/edit" class="btn btn-success btn-sm">
                                        Meet Now
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Deal Timeline details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="detailsModalBody">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script_js')
<script type="text/javascript">
    // console.log('wegr');

    function showDetails(data, status) {
        console.log(data, status);

        $('#detailsModalBody').html(
            `
            <div class="col-md-12">
                    <h6 class="bg-info p-2 text-center text-bold" style="border-radius: 5px">
                        Deal Information
                    </h6>
                    <div class="row">
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="customer_id">Customer</label>
                                <div>${data['customer']['title'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="service_id">Service</label>
                                <div>${data['service']['name'] || 'N.A'}</div>
                            </div>
                        </div>

                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="service_year">Service Year</label>
                                <div>${data['service_year'] || 'N.A'}</div>
                            </div>
                        </div>

                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div style="color: ${status[data['status']]['color']};">
                                    ${status[data['status']]['title'] || 'N.A'}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="service_description">Service Description</label>
                                <div>${data['service_description'] || 'N.A'}</div>
                            </div>
                        </div>

                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="next_schedule_date">Next Scheduled Date</label>
                                <div>${data['next_schedule_date'] || 'N.A'}</div>
                            </div>
                        </div>

                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="next_schedule_time">Next Scheduled Time</label>
                                <div>${data['next_schedule_time'] || 'N.A'}</div>
                            </div>
                        </div>

                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="remarks">Remark</label>
                                <div>${data['remarks'] || 'N.A'}</div>
                            </div>
                        </div>

                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="handle_by">Handle By</label>
                                <div>${(data['handle_by_user'] ? data['handle_by_user']['name'] : '') || 'N.A'}</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <h6 class="bg-info p-2 text-center text-bold" style="border-radius: 5px">
                            Flight Information
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="airline_id">Airline</label>
                                <div>${(data['airline'] ? data['airline']['Airline'] : '') || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="class">Class</label>
                                <div>${data['class'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <div>${data['price'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="flight_date">Flight Date</label>
                                <div>${data['flight_date'] || 'N.A'}</div>
                            </div>
                        </div>

                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="flight_time">Flight Time</label>
                                <div>${data['flight_time'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="depature_airport_id">Departure from Airport</label>
                                <div>${(data['depature_airport'] ? data['depature_airport']['name'] : '') || 'N.A'}</div>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="arrival_airport_id">Arrival to Airport</label>
                                <div>${(data['arrival_airport'] ? data['arrival_airport']['name'] : '') || 'N.A'}</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <h6 class="bg-info p-2 text-center text-bold" style="border-radius: 5px">
                            Hotel & Makkah Madina Tour
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="hotel_name">Hotel Name</label>
                                <div>${data['hotel_name'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="hotel_price">Hotel Price</label>
                                <div>${data['hotel_price'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="check_in_date">Check In Date</label>
                                <div>${data['check_in_date'] || 'N.A'}</div>
                            </div>
                        </div>

                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="check_out_date">Check Out Time</label>
                                <div>${data['check_out_date'] || 'N.A'}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="makkah_tour_date">Makkah Tour Date</label>
                                <div>${data['makkah_tour_date'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="makkah_tour_price">Makkah Tour Price</label>
                                <div>${data['makkah_tour_price'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="madina_tour_date">Madina Tour Date</label>
                                <div>${data['madina_tour_date'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6 deal-info-block">
                            <div class="form-group">
                                <label for="hotel_price">Madina Tour Price</label>
                                <div>${data['hotel_price'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsible_person">Responsible Person</label>
                                <div>${data['responsible_person'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsible_person_mobile">Mobile No</label>
                                <div>${data['responsible_person_mobile'] || 'N.A'}</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <h6 class="bg-info p-2 text-center text-bold" style="border-radius: 5px">
                            Others
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="source_of_media">Source of Media</label>
                                <div>${data['source_of_media'] || 'N.A'}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="promotional_offer">Promotional Offer</label>
                                <div>${data['promotional_offer'] || 'N.A'}</div>
                            </div>
                        </div>
                    </div>
                </div>
            `
        );

        $('#detailsModal').modal('show');
    }
</script>
@endpush
