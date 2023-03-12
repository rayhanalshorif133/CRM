@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        New Deal
                    </h3> 
                </div> <!-- /.card-body -->
                <div class="card-body">
                    <div class="row" id="customer_information">
                        <div class="col-md-12 p-3 text-info">
                            <h6 class="bg-info p-2 text-center text-bold" style="border-radius: 5px">
                                Customer Information
                            </h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="customer_name">NID</label>
                                        <input type="text" onchange="select_customer_data('nid',this.value)" class="form-control" id="nid" name="nid" placeholder=" NID">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="customer_name">Birth ID</label>
                                        <input type="text" class="form-control" id="birth_id" name="birth_id" placeholder=" Birth ID">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="customer_name">Mobile 1</label>
                                        <input type="text" class="form-control" id="mobile1" name="mobile1" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="customer_name">Mobile 2</label>
                                        <input type="text" class="form-control" id="mobile2" name="mobile2" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Sur Name</label>
                                        <input type="text" class="form-control" id="sur_name" name="sur_name" placeholder="Sur Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Given Name</label>
                                        <input type="text" class="form-control" id="given_name" name="given_name" placeholder="Given Name">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer_name">Father Name</label>
                                        <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Father Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer_name">Mother Name</label>
                                        <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="customer_name">Marital Status</label>
                                        <select name="marital_status" id="marital_status" class="form-control select2">
                                            <option value="">Select One</option>
                                            <option value="Married">Married</option>
                                            <option value="Single">Single</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Spouse Name</label>
                                        <input type="text" class="form-control" id="spouse_name" name="spouse_name" placeholder="Spouse Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Gender</label>
                                        <select name="gender" id="gender" class="form-control select2">
                                            <option value="">Select One</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Nationality</label>
                                        <select name="nationality" id="nationality" class="form-control select2">
                                            <option value="">Select One</option>
                                            @foreach ($countries as $item)
                                                <option value="{{ $item->nationality }}">{{ $item->nationality }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Religion</label>
                                        <select name="religion" id="religion" class="form-control select2">
                                            <option value="">Select One</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Buddhism">Buddhism</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Blood Group</label>
                                        <select name="blood_group" id="blood_group" class="form-control select2">
                                            <option value="">Select One</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Passport No</label>
                                        <input type="text" class="form-control" id="passport_no" name="passport_no" placeholder="Passport No">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Date Of Birth</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date Of Birth">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Date Of Issue</label>
                                        <input type="date" class="form-control" id="date_of_issue" name="date_of_issue" placeholder="Date Of Issue">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer_name">Present Address</label>
                                        <input type="text" class="form-control" id="present_address" name="present_address" placeholder="Present Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer_name">Permanent Address</label>
                                        <input type="text" class="form-control" id="permanent_address" name="permanent_address" placeholder="Permanent Address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Organization</label>
                                        <input type="text" class="form-control" id="organization" name="organization" placeholder="Organization">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Designation</label>
                                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_name">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-md-12 text-right">
                                    <div class="form-group">
                                        <button class="btn btn-info btn-lg">Next <i class="fas fa-arrow-right"></i> </button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
      </div>
  </div>
</div>
<script>
    function select_customer_data(field_name,field_value){
        
    }
</script>
@endsection