@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 title-search" >
          <div class="col-sm-6 col-md-8">
          <p class="m-0 pt-2">DEALS / Timeline</p>
        </div><!-- /.col -->
        <div class="col-sm-6 col-md-4">
           <!-- SidebarSearch Form -->
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6">
            <div class="title-bg">
                <h3>Timeline of the Deal</h3>              
              </div>
          </div> 
          <div class="col-md-6">                   
            <div class="title-bg">
                <h3>Deal details</h3>
              </div>
          </div>
        </div>
        <!-- Main row -->
        <!-- /.row -->
        <div class="row deal-detail-panel">
          <div class="col-md-6">
             <div class="card">
           
              <div class="card-body">
                <div class="tab-content">                
                  <!-- /.tab-pane -->
                  <div class=" active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      
                      @foreach($timelines as $timeline)
                      <div class="time-label">
                        <span style="background-color:#00d4cd;">
                            {{date_format($timeline->created_at,"d M Y h:i A")}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas bg-primary"></i>

                        <div class="timeline-item">
                          <!-- <span class="time"><i class="far fa-clock"></i> 12:05</span> -->

                          <h3 class="timeline-header">
                            @if ($loop->last)
                                Created {{$timeline->service->name}} Service for {{$timeline->customer->title}}  {{$timeline->customer->sur_name}}
                            @else
                                Meeting with {{$timeline->customer->title}}  {{$timeline->customer->sur_name}} for {{$timeline->service->name}}
                            @endif
                            <br/>
                            <small>
                                @php
                                $datetime1 = new DateTime();
                                $datetime2 = new DateTime($timeline->created_at);
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
                            </small>
                          </h3>

                          <div class="timeline-body">
                            {{$timeline->remarks}}<br>
                           <p>
                                Next Scdedul: 
                                <span>
                                    @php
                                    $date=date_create($timeline->next_schedule_date);
                                    echo date_format($date,"d M Y ");
                                    echo date('h:i A', strtotime($timeline->next_schedule_time));
                                    @endphp
                                </span>
                            </p>
                          </div>
                          <div class="timeline-footer">
                                            <!-- Button trigger modal -->
                              <button type="button" class="btn view-btn-bg" onclick="showDetails({{json_encode($timeline)}},{{json_encode($status)}})">
                              View Detial
                              </button>
                            
                          </div>
                        </div>
                        
                      </div>
                      
                      @endforeach
                      <!-- END timeline item -->
                     
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6" style="margin-bottom: 10%;">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                          <thead>
                            <tr  >
                              <th colspan="2" class="border-colspan text-center">CURRENT DEAL INFORMATION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td >
                                <span style="color:#3fb4b1;">NID</span>
                                <br>
                                <p>{{$deal->customer->nid}}</p>
                              </td> 
                              <td  style="width:53%; overflow: hidden;" >
                                <span style="color:#3fb4b1;">Birth ID</span>
                                <br>
                                <p>{{$deal->customer->birth_id}}</p>
                              </td>                                     
                            </tr>   
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Mobile 1</span>
                                <br>
                                <p>{{$deal->customer->mobile1}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Mobile 2</span>
                                <br>
                                <p>{{$deal->customer->mobile2}}</p>
                              </td>                                     
                            </tr>    
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Customer</span>
                                <br>
                                <p>{{$deal->customer->title}} {{$deal->customer->sur_name}} {{$deal->customer->given_name}}</p>
                              </td> 
                                                                
                            </tr>    
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Service</span>
                                <br>
                                <p>{{$deal->service->name}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Type</span>
                                <br>
                                <p>{{($deal->sub_service != null)?$deal->sub_service->name:''}}</p>
                              </td>                               
                            </tr>  
                            <tr>
                              <td> 
                                <span style="color:#3fb4b1;">Service Year</span>
                                <br>
                                <p>{{$deal->service_year}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Service Description</span>
                                <br>
                                <p>{{$deal->service_description ?? 'N.A'}}</p>
                              </td>
                            </tr>
                            
                            <tr>
                                <td> 
                                  <span style="color:#3fb4b1;">Deal Status</span>
                                  <br>
                                  <p style="color:{{$status[$deal->status]['color']}}">{{$status[$deal->status]['title']}}</p>
                                </td> 
                                <td>
                                  <span style="color:#3fb4b1;">Registration Status</span>
                                  <br>
                                  <p>{{$deal->customer_status}}</p>
                                </td>
                              </tr>
                              <tr>
                                <td> 
                                  <span style="color:#3fb4b1;">Next Scheduled</span>
                                  <br>
                                  <p>{{date('d/m/Y',strtotime($deal->next_schedule_date)) ?? 'N.A'}} {{$deal->next_schedule_time ?? 'N.A'}}</p>
                                </td> 
                                <td>
                                  <span style="color:#3fb4b1;">Remark</span>
                                  <br>
                                  <p>{{$deal->remarks ?? 'N.A'}}</p>
                                </td>
                              </tr>
                                            
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->  
                    <div class="card">
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr  >
                              <th colspan="2" class="border-colspan text-center" >FLIGHT INFORMATION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Booking Reference</span>
                                <br>
                                <p>{{$deal->booking_reference ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Flight date</span>
                                <br>
                                <p>{{$deal->flight_date ?? 'N.A'}} {{$deal->flight_time ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>   
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Airline</span>
                                <br>
                                <p>{{$deal->airline_id ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Deperture airport</span>
                                <br>
                                <p>{{$deal->depurture_airport->name ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>    
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Arrival airport</span>
                                <br>
                                <p>{{$deal->arrival_airport->name ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Price</span>
                                <br>
                                <p>{{$deal->price ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>    
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Ticket status</span>
                                <br>
                                <p>{{$deal->ticket_status ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Special Need<</span>
                                <br>
                                <p> {{$deal->special_need ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>  
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card --> 
                    <div class="card">
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr  >
                              <th colspan="2" class="border-colspan text-center" >MAKKAH & MADINA INFORMATION</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Hotel name</span>
                                <br>
                                <p>{{$deal->hotel_name ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Makkah tour date</span>
                                <br>
                                <p>{{$deal->makkah_tour_date ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>   
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Price</span>
                                <br>
                                <p>{{$deal->hotel_price ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Makkah tour price</span>
                                <br>
                                <p>{{$deal->makkah_tour_price ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>   
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Total night</span>
                                <br>
                                <p>{{$deal->total_nights ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Modina tour date</span>
                                <br>
                                <p>{{$deal->madina_tour_date ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>    
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Total amount</span>
                                <br>
                                <p>{{$deal->total_amount ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Madina tour price</span>
                                <br>
                                <p>321</p>
                              </td>                                     
                            </tr>  
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Check in date</span>
                                <br>
                                <p>{{$deal->check_in_date ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Responsible persion</span>
                                <br>
                                <p>{{$deal->responsible_person ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>   
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Check out date</span>
                                <br>
                                <p>{{$deal->check_out_date ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Moble no</span>
                                <br>
                                <p>{{$deal->responsible_person_mobile ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>  
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <div class="card">
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr  >
                              <th colspan="2" class="border-colspan text-center" >OTHER</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Source of media</span>
                                <br>
                                <p>{{$deal->source_of_media ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                <span style="color:#3fb4b1;">Promotion offere</span>
                                <br>
                                <p>{{$deal->promotional_offer ?? 'N.A'}}</p>
                              </td>                                     
                            </tr>   
                            <tr>
                              <td>
                                <span style="color:#3fb4b1;">Reffered by</span>
                                <br>
                                <p>{{$deal->referred_by ?? 'N.A'}}</p>
                              </td> 
                              <td>
                                
                              </td>                                     
                            </tr>    
                            
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>   
        
            </div>
          </div>
        
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
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