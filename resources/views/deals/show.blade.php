@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 title-search" >
        
          <div class="col-sm-6 col-md-8">
          <p class="m-0 pt-2">DEALS / PENDING  DEALS / DETAILS</p>
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
        <div class="row">
            <div class="col-md-6 col-sm-12">
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
              </div>
            <div class="col-md-6 col-sm-12">
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
</section>


@endsection
@push('script_js')
<script type="text/javascript">
    // console.log('wegr');


</script>
@endpush