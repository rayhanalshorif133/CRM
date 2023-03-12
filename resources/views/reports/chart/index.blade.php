@extends('layouts.app')
@section('title')
|| Leads Reports
@endsection
@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-2">
            <div class="card card-info">
                <div class="card-header text-bold">Leads Reports</div>
                <div class="card-body row">
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
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="">Select User</label>
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

                    <div class="col-md-2">
                        <button class="btn btn-sm btn-outline-info searchBtn"
                            style="margin-top: 2.3rem!important;">Search</button>
                    </div>
                </div>
            </div>
            <div class="card card-info">
                <div class="card-header">Lead Reports Chart</div>
                <div class="card-body">
                    <div class="info d-flex justify-content-between">
                        <p class="text-bold">User: <span class="select-user">Not Selected</span></p>
                        <p class="text-bold">Date: <span class="select-date">Not Selected</span></p>
                        <p class="text-bold">Total Leads: <span class="totalLeads">0</span></p>
                        <p class="text-bold">Completed Leads: <span class="completedLeads">0</span></p>
                    </div>
                    <div class="chart">
                        <canvas id="reportChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script_js')
<script src="{{ asset('plugins/chart.js/npm/chart.js') }}"></script>
<script src="{{ asset('js/reports/chart.js') }}"></script>
@endpush
