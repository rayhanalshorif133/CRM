@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 title-search" >
        
          <div class="col-sm-6 col-md-8">
          <p class="m-0 pt-2">DEAL / PENDING DEAL</p>
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
        <div class="col-md-12">
          <div class="pending-title" style="border-bottom: #fff solid 2px;">
              <div class="row">
                <div class="col-md-12">
                  <h3>Pending Deals</h3>
                </div> 
                
              </div>
          </div>
        </div>
      </div>
      <!-- Main row -->
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap pending-table">
                <thead>
                  <tr  style="text-align: center;">
                    <th class="border-left-top">SL No</th>
                    <th class="border-panel">CUSTOMER</th>
                    <th class="border-panel">SERVICE</th>
                    <th class="border-panel">STATUS</th> 
                    <th class="border-panel">NEXT SCHEDUL</th>
                    <th class="border-panel">REMARK</th>
                    <th class="border-panel">INITIATED</th>
                    <th class="border-right-top">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($deals as $deal)
                <tr style="text-align: center;">
                    <td>{{$loop->iteration }}</td>
                   <td>
                    {{$deal->customer->title}} {{$deal->customer->sur_name}} {{$deal->customer->given_name}}
                    <br/>{{$deal->customer->mobile1}}
                   </td>
                   <td>
                    {{$deal->service->name}}
                   </td>
                   <td style="color: {{$status[$deal->status]['color']}};">
                    {{$status[$deal->status]['title']}}
                   </td>
                   <td>
                    <div>{{date('d/m/Y',strtotime($deal->next_schedule_date))}}</div>
                    <div>{{$deal->next_schedule_time}}</div>
                    
                   </td>
                   <td>
                    {{$deal->remark}}
                   </td>
                   <td>
                    {{date('d/m/Y H:i:s',strtotime($deal->created_at))}}
                   </td>
                   <td>
                    <a href="/deal/{{$deal->id}}" title="details view"><i class="fas fa-eye"></i></a>
                    <a href="/deal/{{$deal->id}}/timeline" title="timeline"><i class="fas fa-stream"></i></a>
                    <a href="/deal/{{$deal->id}}/edit" title="edit"><i class="fas fa-edit"></i></a>
                   </td>
                </tr>
                @endforeach

                  
                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  
@endsection
@push('script_js')
<script type="text/javascript">
    // console.log('wegr');

    
</script>
@endpush