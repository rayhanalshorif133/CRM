@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        User Permission
                        
                    </h3> 
                </div> <!-- /.card-body -->
                <div class="card-body p-5">
                    <form action="{{url('save-permission')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="user">User</label>
                            <select name="user_id" id="user_id" class="form-control" onchange="select_menu(this.value)">
                                <option value="">Select User</option>
                                @foreach ($user_data as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Select Your Accessable Menu
                                </h3> 
                            </div>
                            <div class="card-body pl-5">
                                <div class="w-100 text-right">
                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input"   id="select-all" style="cursor: pointer !important">
                                        <label class="custom-control-label" for="select-all">Select All</label>
                                    </div>
                                </div>
                                

                                <div id="body" class="w-100">
                                    

                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" value="vendor" name="menu[]" id="customSwitch9" style="cursor: pointer !important">
                                        <label class="custom-control-label" for="customSwitch9">Vendor / Sub Contractor</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 pl-5">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" value="vendor|vendor-payment-list" name="sub_menu[]">
                                                <label >Payment List</label>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" value="basic_settings" name="menu[]" id="customSwitch14" style="cursor: pointer !important">
                                        <label class="custom-control-label" for="customSwitch14">Basic Settings</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary m-5"><i class="fa fa-check"></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.card-body -->
              </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function select_menu(user_id){
        //alert(user_id);
        url = '{{ url('select-user-menu') }}';
        url = url+'/'+user_id;
        //alert(url);
        $.ajax({
            cache   : false,
            type    : "GET",
            error   : function(xhr){ alert("An error occurred: " + xhr.status + " " + xhr.statusText); },
            url : url,
            success : function(response){
                $('#body').html(response);
            }
        })
    }

    $('#select-all').click(function(event) {   
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;                        
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;                       
            });
        }
    });
</script>
@endsection

