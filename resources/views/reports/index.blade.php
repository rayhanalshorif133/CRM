@extends('layouts.app')
@section('title')
|| Reports
@endsection
@section('content')
<style>
    .bg-info {
        background-color: #17a2b8 !important;
    }

    .bg-primary {
        background-color: #007bff !important;
    }

    .bg-soft-sky {
        background-color: #E4F2F2 !important;
    }
</style>
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="card card-info">
                <div class="card-header text-bold">Reports</div>
                <div class="card-body row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="required">Select User</label>
                            <select class="form-control select2 select2-info selectUser"
                                data-dropdown-css-class="select2-info" style="width: 100%;" tabindex="-1"
                                aria-hidden="true">
                                <option selected="selected" disabled data-select2-id="0">Select User</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="date" class="required">Select Date</label>
                            <div class="input-group date" id="searchDate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input dateSearch"
                                    data-target="#searchDate">
                                <div class="input-group-append" data-target="#searchDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-sm btn-outline-info searchBtn"
                            style="margin-top: 2.3rem!important;">Search</button>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered text-center display" id="reportInfoTable"
                style="width:100%">
                <thead>
                    <tr class="bg-info">
                        <th>SL</th>
                        <th>Customer Name</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@include('reports._partials.showModel')
@endsection
@push('script_js')
{{-- <script src="{{asset('js/reports/index.js')}}"></script> --}}
<script>
    var table = "";
    var user_id = "";
    var date = "";
    $(document).ready(function(){
    handleDatePicker();
    initializeDatatable();
    handleSearchBtn();
    });


    function initializeDatatable(){
      table = $('#reportInfoTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    }


    function handleSearchBtn(){
        $('.searchBtn').on('click', function(){
            user_id = $(".selectUser").val();
            $(".reportInfoTable").removeClass("d-none");
            $(".beforeReportInfoTable").addClass("d-none");
            date = $('#searchDate .datetimepicker-input').val();
            date = formatDate(date);
            table.destroy();
            appendInfoInTable();
        });
    }



    function appendInfoInTable(){
        let url = '/report/get-data/' + user_id + '/' + date + '/';
        table = $('#reportInfoTable').DataTable({
        "ajax" : {
        url:url,
        method:"GET"
        },
        "bSort": true,
        columns: [
        {
        sortable: false,
        "render": function ( data, type, full, meta ) {
        return meta.row + meta.settings._iDisplayStart + 1;
        }
        },
        {data: 'customer.title'},
        {data: 'service.name'},
        {
        sortable: false,
        "render": function ( data, type, full, meta ) {
        return getStatus(full.status);
        }
        },
        {
        sortable: false,
        "render": function ( data, type, full, meta ) {
        return `<span id='${full.id}' data-toggle="modal" data-target="#showReportInfo"
            class="btn btn-sm btn-outline-info showReportInfo"><i class="fa fa-eye"></i></span>`;
        }
        },
        ],
        "bPaginate":true,
        "bLengthChange":true,
        "pageLength": 10,
        });
        showReportInfo();

    }




    function showReportInfo(){
        $(document).on('click','.showReportInfo',function(){
            var id = $(this).attr('id');
            console.log(id);
            $.ajax({
                url: "{{route('report.show')}}",
                type: "POST",
                data: {id: id},
                success: function(response){
                    let data = response.data;
                    console.log(data);
                    // get all only labels
                    var labels = $('#showReportInfo .modal-body label');
                    // remove all div after labels
                    labels.each(function(){
                        $(this).next().remove();
                    });
                    $("label[for='customer_id']").after(`
                    <div class="">
                        <span>${data.customer ? data.customer.title + '(' + data.customer.sur_name + ")" : 'N.A' }</span>
                    </div>
                    `);
                    $("label[for='service_id']").after(`
                    <div class="">
                        <span>${data.service ? data.service.name : 'N.A' }</span>
                    </div>
                    `);
                    $("label[for='service_year']").after(`
                    <div class="">
                        <span>${data.service_year ? data.service_year : 'N.A' }</span>
                    </div>
                    `);
                    $("label[for='status']").after(`
                    <div class="">
                        <span>${getStatus(data.status)}</span>
                    </div>
                    `);
                    $("label[for='service_description']").after(`
                    <div class="">
                        <span>${data.service_description ? data.service_description : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='next_schedule_date']").after(`
                    <div class="">
                        <span>${data.next_schedule_date ? data.next_schedule_date : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='next_schedule_time']").after(`
                    <div class="">
                        <span>${data.next_schedule_time ? data.next_schedule_time : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='remarks']").after(`
                    <div class="">
                        <span>${data.remarks ? data.remarks : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='handle_by']").after(`
                    <div class="">
                        <span>${data.handle_by_user ? data.handle_by_user.name : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='airline_id']").after(`
                    <div class="">
                        <span>${data.airline ? data.airline : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='class']").after(`
                    <div class="">
                        <span>${data.class ? data.class : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='price']").after(`
                    <div class="">
                        <span>${data.price ? data.price : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='flight_date']").after(`
                    <div class="">
                        <span>${data.flight_date ? data.flight_date : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='flight_time']").after(`
                    <div class="">
                        <span>${data.flight_time ? data.flight_time : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='depature_airport_id']").after(`
                    <div class="">
                        <span>${data.depature_airport ? data.depature_airport : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='arrival_airport_id']").after(`
                    <div class="">
                        <span>${data.arrival_airport ? data.arrival_airport : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='hotel_name']").after(`
                    <div class="">
                        <span>${data.hotel_name ? data.hotel_name : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='hotel_price']").after(`
                    <div class="">
                        <span>${data.hotel_price ? data.hotel_price : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='check_in_date']").after(`
                    <div class="">
                        <span>${data.check_in_date ? data.check_in_date : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='check_out_date']").after(`
                    <div class="">
                        <span>${data.check_out_date ? data.check_out_date : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='makkah_tour_date']").after(`
                    <div class="">
                        <span>${data.makkah_tour_date ? data.makkah_tour_date : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='makkah_tour_price']").after(`
                    <div class="">
                        <span>${data.makkah_tour_price ? data.makkah_tour_price : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='madina_tour_date']").after(`
                    <div class="">
                        <span>${data.madina_tour_date ? data.madina_tour_date : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='madina_tour_price']").after(`
                    <div class="">
                        <span>${data.madina_tour_price ? data.madina_tour_price : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='responsible_person']").after(`
                    <div class="">
                        <span>${data.responsible_person ? data.responsible_person : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='responsible_person_mobile']").after(`
                    <div class="">
                        <span>${data.responsible_person_mobile ? data.responsible_person_mobile : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='source_of_media']").after(`
                    <div class="">
                        <span>${data.source_of_media ? data.source_of_media : 'N.A'}</span>
                    </div>
                    `);
                    $("label[for='promotional_offer']").after(`
                    <div class="">
                        <span>${data.promotional_offer ? data.promotional_offer : 'N.A'}</span>
                    </div>
                    `);
                }
            });
        });
    }

    function handleDatePicker(){
    $('#searchDate').datetimepicker({
    format: 'L',
    icons: {
    time: "fa fa-clock-o",
    date: "fa fa-calendar",
    up: "fa fa-arrow-up",
    down: "fa fa-arrow-down"
    },
    autoclose: true,
    });
    }

    function getStatus(status){
        if(status == 0){
            return '<span class="badge bg-danger">Failed</span>';
        }else if(status == 1){
            return '<span class="badge bg-primary">Initial</span>';
        }else if(status == 2){
            return '<span class="badge bg-info">On Proceed</span>';
        }else{
            return '<span class="badge bg-success">Completed</span>';
        }
    }

    function formatDate(dateObject) {
        var d = new Date(dateObject);
        var day = d.getDate();
        var month = d.getMonth() + 1;
        var year = d.getFullYear();
        if (day < 10) { day="0" + day; } if (month < 10) { month="0" + month; } var date=day + "-" + month + "-" + year;
        return date;
    };
</script>
@endpush
