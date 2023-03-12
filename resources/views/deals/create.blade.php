@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 title-search">

            <div class="col-sm-6 col-md-8">
                <p class="m-0 pt-2">DEALS / {{isset($deal)?'UPDATE':'NEW'}} DEAL</p>
            </div><!-- /.col -->
            <div class="col-sm-6 col-md-4">
                <!-- SidebarSearch Form -->
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
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
<!-- /.content-header and search -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- =========================== -->
                <div class="tab-warp">
                    <div id="at-tabs-c2a3d74" class="at-tabs">
                        <div class="at-tabs-nav top-tab-panel">

                            <div class="at-tabs-nav__item title-top">
                                <a class="at-tabs-title" href="#">
                                    <div class="at-title-text-wrapper">
                                        <span class="at-tab-__title_text current">Deal Information</span>
                                    </div>
                                </a>
                            </div>


                        </div>
                        <!-- top-tab-panel -->
                        <div class="at-tabs-content middel-tap-content">
                            <div class="at-tabs-content__item middel-client-tap-panel">
                                <form action="{{isset($deal)?route('update-deal',$deal->id):route('store-deal')}}"
                                    method="post">
                                    @csrf
                                    <div id="at-tabs-c2a3d74" class="at-tabs">
                                        <div class="at-tabs-nav sub-navbar sub-title-panel">
                                            <div class="at-tabs-nav__item">
                                                <a class="at-tabs-title" href="#">
                                                    <div class="at-title-text-wrapper">
                                                        <span class="at-tab-__title_text current">Basic
                                                            information</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="at-tabs-nav__item">
                                                <a class="at-tabs-title" href="#">
                                                    <div class="at-title-text-wrapper">
                                                        <span class="at-tab-__title_text">Flight information</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="at-tabs-nav__item">
                                                <a class="at-tabs-title" href="#">
                                                    <div class="at-title-text-wrapper">
                                                        <span class="at-tab-__title_text">Hotel & Makkah Madina
                                                            Tour</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="at-tabs-nav__item">
                                                <a class="at-tabs-title" href="#">
                                                    <div class="at-title-text-wrapper">
                                                        <span class="at-tab-__title_text">Other information</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="at-tabs-content sub-content-panel">
                                            <div class="at-tabs-content__item">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Custormar Name</label>
                                                            <select class="form-control" id="customer_id"
                                                                name="customer_id">
                                                                <option value="{{$customer->id}}">{{$customer->title}}
                                                                    {{$customer->sur_name}} {{$customer->given_name}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Service Year</label>
                                                            <input type="number"
                                                                class="form-control @error('service_year') is-invalid @enderror"
                                                                value="{{ isset($deal)?$deal->service_year : old('service_year') }}"
                                                                id="service_year" name="service_year">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Service</label>
                                                            <select
                                                                class="form-control @error('service_id') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->service_id : old('service_id') }}"
                                                                id="service_id" name="service_id"
                                                                onchange="load_sub_service(this.value)">
                                                                <option value="">Select One</option>
                                                                @foreach($services as $service)
                                                                <option {{isset($deal) && $deal->
                                                                    service_id==$service->id
                                                                    ?'selected':''}}
                                                                    value="{{$service->id}}">{{$service->name}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group select-bg">
                                                            <label>Deal status</label>
                                                            <select
                                                                class="form-control @error('status') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->status : old('status') }}"
                                                                id="status" name="status">
                                                                <option value="1">Initial</option>
                                                                @if(isset($deal))
                                                                <option value="2">On Proceed</option>
                                                                <option value="3">Completed</option>
                                                                <option value="0">Failed</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Service Type</label>
                                                            <select
                                                                class="form-control @error('sub_service_id') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->sub_service_id : old('sub_service_id') }}"
                                                                id="sub_service_id" name="sub_service_id">
                                                                <option value="">Select One</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Registration Status</label>
                                                            <select
                                                                class="form-control @error('customer_status') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->customer_status : old('customer_status') }}"
                                                                id="customer_status" name="customer_status">
                                                                <option value="Pre-Registration">Pre-Registration
                                                                </option>
                                                                <option value="Registration">Registration</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Service Description</label>
                                                            <textarea
                                                                class="form-control @error('service_description') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->service_description : old('service_description') }}"
                                                                name="service_description" rows="3"
                                                                id="service_description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <!-- Date and time -->
                                                        <div class="form-group">
                                                            <label for="next_schedule_date">Next Scheduled Date</label>
                                                            <input type="date"
                                                                class="form-control @error('next_schedule_date') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->next_schedule_date : old('next_schedule_date') }}"
                                                                id="next_schedule_date" name="next_schedule_date">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <!-- Date and time -->
                                                        <div class="form-group">
                                                            <label for="next_schedule_time">Next Scheduled Time</label>
                                                            <input type="time"
                                                                class="form-control @error('next_schedule_time') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->next_schedule_time : old('next_schedule_time') }}"
                                                                id="next_schedule_time" name="next_schedule_time">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Handled by</label>
                                                            <select class="form-control select2 handleByUser"
                                                                name="handle_by">
                                                                <option value="">Select One</option>
                                                                @foreach ($users as $item)
                                                                <option {{(isset($deal) && $deal->handle_by ==
                                                                    $item->id)?'selected':''}}
                                                                    value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Remark</label>
                                                            <input type="text"
                                                                class="form-control @error('remarks') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->remarks : old('remarks') }}"
                                                                id="remarks" name="remarks">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="at-tabs-content__item">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Booking Reference</label>
                                                            <input type="text"
                                                                class="form-control @error('booking_reference') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->booking_reference : old('booking_reference') }}"
                                                                id="booking_reference" name="booking_reference">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Airline</label>
                                                            <select class=" form-control select2" name="airline_id">
                                                                <option value="">Select One</option>
                                                                @foreach ($airlines as $item)
                                                                <option {{(isset($deal) && $deal->airline_id ==
                                                                    $item->id)?'selected':''}}
                                                                    value="{{$item->id}}">{{$item->IATA}} -
                                                                    {{$item->Airline}} - {{$item->Country}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Class</label>
                                                            <select name="class" id="class"
                                                                class="form-control @error('class') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->class : old('class') }}">
                                                                <option value="">Select One</option>
                                                                <option value="First Class">First Class</option>
                                                                <option value="Business Class">Business Class</option>
                                                                <option value="Economy">Economy</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Price</label>
                                                            <input type="number" step=".01"
                                                                class="form-control @error('price') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->price : old('price') }}"
                                                                id="price" name="price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="flight_date">Flight Date</label>
                                                            <input type="date"
                                                                class="form-control @error('flight_date') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->flight_date : old('flight_date') }}"
                                                                id="flight_date" name="flight_date">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="flight_time">Flight Time</label>
                                                            <input type="time"
                                                                class="form-control @error('flight_time') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->flight_time : old('flight_time') }}"
                                                                id="flight_time" name="flight_time">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Deperture Airport</label>
                                                            <select
                                                                class="form-control select2 @error('depature_airport_id') is-invalid @enderror"
                                                                name="depature_airport_id">
                                                                <option value="">Select One</option>
                                                                @foreach ($airports as $item)
                                                                <option {{(isset($deal) && $deal->depature_airport_id ==
                                                                    $item->id)?'selected':''}}
                                                                    value="{{$item->id}}">{{$item->code}} -
                                                                    {{$item->name}} - {{$item->countryName}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Arrival Airport</label>
                                                            <select
                                                                class="form-control select2 @error('arrival_airport_id') is-invalid @enderror"
                                                                name="arrival_airport_id" {{(isset($deal) &&
                                                                $deal->arrival_airport_id == $item->id)?'selected':''}}>
                                                                <option value="">Select One</option>
                                                                @foreach ($airports as $item)
                                                                <option value="{{$item->id}}">{{$item->code}} -
                                                                    {{$item->name}} - {{$item->countryName}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Ticket Status</label>
                                                            <select name="ticket_status" id="ticket_status"
                                                                class="form-control @error('ticket_status') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->ticket_status : old('ticket_status') }}">
                                                                <option value="">Select One</option>
                                                                <option value="Issue">Issue</option>
                                                                <option value="Reissue">Reissue</option>
                                                                <option value="Refund">Refund</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="depature_time">Special Need</label>
                                                            <input type="text"
                                                                class="form-control @error('special_need') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->special_need : old('special_need') }}"
                                                                id="special_need" name="special_need">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="at-tabs-content__item">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Hotel name</label>
                                                            <input type="text"
                                                                class="form-control @error('hotel_name') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->hotel_name : old('hotel_name') }}"
                                                                id="hotel_name" name="hotel_name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Check in date</label>
                                                            <div class="input-group date" id="reservationdatefive"
                                                                data-target-input="nearest">
                                                                <input type="text"
                                                                    class="form-control datetimepicker-input @error('check_in_date') is-invalid @enderror"
                                                                    value="{{isset($deal)?$deal->check_in_date : old('check_in_date') }}"
                                                                    data-target="#reservationdatefive"
                                                                    id="check_in_date" name="check_in_date" />
                                                                <div class="input-group-append"
                                                                    data-target="#reservationdatefive"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Check out date</label>
                                                            <div class="input-group date" id="reservationdatesix"
                                                                data-target-input="nearest">
                                                                <input type="text"
                                                                    value="{{isset($deal)?$deal->check_out_date : old('check_out_date') }}"
                                                                    class="form-control datetimepicker-input @error('check_out_date') is-invalid @enderror"
                                                                    data-target="#reservationdatesix"
                                                                    id="check_out_date" name="check_out_date" />
                                                                <div class="input-group-append"
                                                                    data-target="#reservationdatesix"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Price per night</label>
                                                            <input type="text"
                                                                class="form-control @error('hotel_price') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->hotel_price : old('hotel_price') }}"
                                                                id="hotel_price" name="hotel_price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Total night</label>
                                                            <input type="number"
                                                                class="form-control @error('total_nights') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->total_nights : old('total_nights') }}"
                                                                id="total_nights" name="total_nights">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Total amount</label>
                                                            <input type="number"
                                                                class="form-control @error('total_amount') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->total_amount : old('total_amount') }}"
                                                                id="total_amount" name="total_amount">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Makkah tour date</label>
                                                            <div class="input-group date" id="reservationdateseven"
                                                                data-target-input="nearest">
                                                                <input type="text"
                                                                    class="form-control @error('makkah_tour_date') is-invalid @enderror datetimepicker-input"
                                                                    value="{{isset($deal)?$deal->makkah_tour_date : old('makkah_tour_date') }}"
                                                                    id="makkah_tour_date" name="makkah_tour_date"
                                                                    data-target="#reservationdateseven" />
                                                                <div class="input-group-append"
                                                                    data-target="#reservationdateseven"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Makkah tour price</label>
                                                            <input type="number" step=".01"
                                                                class="form-control @error('makkah_tour_price') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->makkah_tour_price : old('makkah_tour_price') }}"
                                                                id="makkah_tour_price" name="makkah_tour_price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Madina tour date</label>
                                                            <div class="input-group date" id="reservationdateeight"
                                                                data-target-input="nearest">
                                                                <input type="text" @error('madina_tour_date') is-invalid
                                                                    @enderror class="form-control datetimepicker-input"
                                                                    value="{{isset($deal)?$deal->madina_tour_date : old('madina_tour_date') }}"
                                                                    id="madina_tour_date" name="madina_tour_date"
                                                                    data-target="#reservationdateeight" />
                                                                <div class="input-group-append"
                                                                    data-target="#reservationdateeight"
                                                                    data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                            class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Madina tour price</label>
                                                            <input type="number" step=".01"
                                                                class="form-control @error('madina_tour_price') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->madina_tour_price : old('madina_tour_price') }}"
                                                                id="madina_tour_price" name="madina_tour_price">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Responsible Persion</label>
                                                            <input type="text"
                                                                class="form-control @error('responsible_person') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->responsible_person : old('responsible_person') }}"
                                                                id="responsible_person" name="responsible_person">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Mobile number</label>
                                                            <input type="text"
                                                                class="form-control @error('responsible_person_mobile') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->responsible_person_mobile : old('responsible_person_mobile') }}"
                                                                id="responsible_person_mobile"
                                                                name="responsible_person_mobile">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="at-tabs-content__item">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Source of media</label>
                                                            <select name="source_of_media" id="source_of_media"
                                                                class="form-control @error('source_of_media') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->source_of_media : old('source_of_media') }}">
                                                                <option value="">Select One</option>
                                                                <option value="Walking">Walking</option>
                                                                <option value="Walking">Facebook</option>
                                                                <option value="Walking">SMS</option>
                                                                <option value="Walking">Website</option>
                                                                <option value="Referred By">Referred By</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Reffered by</label>
                                                            <input type="text"
                                                                class="form-control @error('referred_by') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->referred_by : old('referred_by') }}"
                                                                id="referred_by" name="referred_by">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Promotional offer</label>
                                                            <input type="text"
                                                                class="form-control @error('promotional_offer') is-invalid @enderror"
                                                                value="{{isset($deal)?$deal->promotional_offer : old('promotional_offer') }}"
                                                                id="promotional_offer" name="promotional_offer">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row submit-btn">
                                                    <div class="col-auto mr-auto"></div>
                                                    <div class="col-auto">
                                                        <button class="btn save-btn">SAVE</button>
                                                    </div>
                                                </div>
                                                <!-- submit-btn -->
                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>


                </div>
                <!-- tap-warp -->
            </div>
        </div>
        <!-- /.row (main row) -->
</section>
<!-- /.content -->

@endsection
@push('script_js')
<script type="text/javascript">
    // console.log('wegr');

    function load_sub_service(service_id){

        $.ajax({
            url: "{{route('load_sub_service')}}",
            type: "POST",
            data: {
                service_id: service_id,
                _token: "{{csrf_token()}}"
            },
            success: function(data){
                $('#sub_service_id').html(data);
            },
            error: function(xhr){
                var err = JSON.parse(xhr.responseText);
                alert(err.message);
            }

        });
    }

    var handle_by_select = $("#handle_by").select2({
        placeholder: 'Select ...',
        allowClear: true,
        ajax: {
            url: "/users",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term || '',
                    page: params.page || 1
                }
            },
            cache: true
        }
    });

    var is_deal_set = `{{isset($deal)}}`;

    console.log(is_deal_set);

    var handle_by_user = `{{isset($deal) ? $deal->handle_by : ''}}`;
    if (handle_by_user != '' || handle_by_user != null) {
        var handle_by_name = `{{$deal->handle_by_user->name ?? ''}}`;
        console.log(handle_by_name);

        var option = new Option(handle_by_name, handle_by_user, true, true);
        handle_by_select.append(option).trigger('change');

    }

    var airline_select = $("#airline_id").select2({
        placeholder: 'Select Airline',
        allowClear: true,
        ajax: {
            url: "/airlines",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term || '',
                    page: params.page || 1
                }
            },
            cache: true
        }
    });

    var airline_option_id = `{{isset($deal) ? $deal->airline_id : ''}}`;
    if (airline_option_id != '' || airline_option_id != null) {
        var airline_name = `{{$deal->airline->Airline ?? ''}}`;
        console.log(airline_name);

        var option = new Option(airline_name, airline_option_id, true, true);
        airline_select.append(option).trigger('change');
    }

    var airport_select = $("#depature_airport_id,#arrival_airport_id").select2({
        placeholder: 'Select Airports',
        allowClear: true,
        ajax: {
            url: "/airports",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term || '',
                    page: params.page || 1
                }
            },
            cache: true
        }
    });

    var departure_option_id = `{{isset($deal) ? $deal->depature_airport_id : ''}}`;
    if (departure_option_id != '' || departure_option_id != null) {
        var depurture_airport_name = `{{$deal->depurture_airport->name ?? ''}}`;
        console.log(depurture_airport_name);

        var option = new Option(depurture_airport_name, departure_option_id, true, true);
        $('#depature_airport_id').append(option).trigger('change');
    }

    var arrival_option_id = `{{isset($deal) ? $deal->arrival_airport_id : ''}}`;
    if (arrival_option_id != '' || arrival_option_id != null) {
        var arrival_airport_name = `{{$deal->arrival_airport->name ?? ''}}`;
        console.log(arrival_airport_name);

        var option = new Option(arrival_airport_name, arrival_option_id, true, true);
        $('#arrival_airport_id').append(option).trigger('change');
    }


</script>


<script>
    $(function () {


      //Date picker
      $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
      });
       //Date picker
      $('#reservationdateone').datetimepicker({
        format: 'YYYY-MM-DD'
      });
      //Date picker
      $('#reservationdatethree').datetimepicker({
        format: 'YYYY-MM-DD'
      });
      //Date picker
      $('#reservationdatefour').datetimepicker({
        format: 'YYYY-MM-DD'
      });
       //Date picker
      $('#reservationdatefive').datetimepicker({
        format: 'YYYY-MM-DD'
      });
      //Date picker
      $('#reservationdatesix').datetimepicker({
        format: 'YYYY-MM-DD'
      });
       //Date picker
      $('#reservationdateseven').datetimepicker({
        format: 'YYYY-MM-DD'
      });
      //Date picker
      $('#reservationdateeight').datetimepicker({
        format: 'YYYY-MM-DD'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
      //Date and time picker
      $('#reservationdatetimeone').datetimepicker({ icons: { time: 'far fa-clock' } });
      //Date and time picker
      $('#reservationdatetimetwo').datetimepicker({ icons: { time: 'far fa-clock' } });
       //Date and time picker
      $('#reservationdatetimethree').datetimepicker({ icons: { time: 'far fa-clock' } });
      //Date and time picker
      $('#reservationdatetimefour').datetimepicker({ icons: { time: 'far fa-clock' } });
      //Date and time picker
      $('#reservationdatetimefive').datetimepicker({ icons: { time: 'far fa-clock' } });
      //Date and time picker
      $('#reservationdatetimesix').datetimepicker({ icons: { time: 'far fa-clock' } });
      //Date and time picker
      $('#reservationdatetimeseven').datetimepicker({ icons: { time: 'far fa-clock' } });
      //Date and time picker
      $('#reservationdatetimeeight').datetimepicker({ icons: { time: 'far fa-clock' } });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker
      $('#reservationone').daterangepicker()
        //Date range picker
      $('#reservationtwo').daterangepicker()
      //Date range picker
      $('#reservationthree').daterangepicker()
      //Date range picker
      $('#reservationfour').daterangepicker()
      //Date range picker
      $('#reservationfive').daterangepicker()
      //Date range picker
      $('#reservationsix').daterangepicker()
      //Date range picker
      $('#reservationseven').daterangepicker()
      //Date range picker
      $('#reservationeight').daterangepicker()

      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'YYYY-MM-DD hh:mm A'
        }
      })
      //Date range picker with time picker
      $('#reservationtimeone').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'YYYY-MM-DD hh:mm A'
        }
      })
      //Date range picker with time picker
      $('#reservationtimetwo').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'YYYY-MM-DD hh:mm A'
        }
      })
      //Date range as a button
      // $('#daterange-btn').daterangepicker(
      //   {
      //     ranges   : {
      //       'Today'       : [moment(), moment()],
      //       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      //       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
      //       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      //       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
      //       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      //     },
      //     startDate: moment().subtract(29, 'days'),
      //     endDate  : moment()
      //   },
      //   function (start, end) {
      //     $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      //   }
      // )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })
      //Timepicker
      $('#timepickerone').datetimepicker({
        format: 'LT'
      })
      //Timepicker
      $('#timepickertwo').datetimepicker({
        format: 'LT'
      })



    })
    // BS-Stepper Init
</script>
<script>
    function atscTabs() {
    $('.at-tabs').each(function(index, item) {
      var $mainContainer = $(this);
      var $menuContainer = $(this).find('.at-tabs-nav__item');
      var $label = $(this).find('.at-tab-__title_text');
      var $content = $(this).find('.at-tabs-content__item');

      $content.hide();
      //adding data attribute
      $label.each(function(idx, ele) {
        $(this).attr('data-target', idx)
      });
      $($menuContainer[0], $label[0]).addClass('current');
      $($content[0]).show();

      //Display current tab content
      $(this).children('.at-tabs-nav').children('.at-tabs-nav__item').click(function(ele) {
        //debugger;
        $(this).closest('.at-tabs').children('.at-tabs-nav').children('.current').removeClass('current').children('.current').removeClass('current');
        $(this).addClass('current');
        $(this).find('.at-tab-__title_text').addClass('current');
        $(this).closest('.at-tabs').find('.at-tabs-content:first > .at-tabs-content__item').hide();
        $(this).closest('.at-tabs').find('.at-tabs-content:first > .at-tabs-content__item').eq(parseInt($(this).find('[data-target]').attr('data-target'))).show();
        ele.stopPropagation();
      });
    });
  }

  atscTabs();
</script>
@endpush
