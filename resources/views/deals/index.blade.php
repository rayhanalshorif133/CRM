@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <style>
        hr {
            border: 0;
            clear: both;
            display: block;
            /* width: 96%; */
            background-color: #17a2b8;
            height: 1px;
            margin: 5px 0px;
        }

        .select2{
            width: 100%;
        }

        label{
            color: #ec8210;
        }

        td a{
            margin: 3px;
        }
    </style>
    <div>
        <div class="text-center">
            <h4 class="bg-info">Deals</h4>
        </div>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr class="bg-info">
                    <th>SL</th>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Next Schedule</th>
                    <th>Remark</th>
                    <th>Initiated at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deals as $deal)
                <tr>
                    <td>{{$loop->iteration}}</td>
                   <td>
                    <div>{{$deal->customer->title}} {{$deal->customer->sur_name}}  {{$deal->customer->given_name}}</div>
                    <div>{{$deal->customer->mobile1}}</div>
                   </td>
                   <td>
                    {{$deal->service->name}}
                   </td>
                   <td style="color: {{$status[$deal->status]['color']}};">
                    {{$status[$deal->status]['title']}}
                   </td>
                   <td>
                    <div>{{date('d/M/Y',strtotime($deal->next_schedule_date))}}</div>
                    <div>{{date('h:i:A',strtotime($deal->next_schedule_time))}}</div>
                    <div></div>
                   </td>
                   <td>
                    {{$deal->remark}}
                   </td>
                   <td>
                    {{date('d/M/Y H:i:A',strtotime($deal->created_at))}}
                   </td>
                   <td>
                    <a href="/deal/{{$deal->id}}" title="details view"><i style="font-size: 20px; cursor:pointer" class="fas fa-money-check"></i></a>
                    <a href="/deal/{{$deal->id}}/timeline"  title="timeline"><i style="font-size: 20px; cursor:pointer" class="fas fa-stream"></i></a>
                    <a href="/deal/{{$deal->id}}/edit"><i style="font-size: 20px; cursor:pointer" class="fas fa-edit"></i></a>
                   </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
@push('script_js')
<script type="text/javascript">
    // console.log('wegr');

    
</script>
@endpush