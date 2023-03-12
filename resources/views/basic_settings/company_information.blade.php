@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        Company Information
                    </h3> 
                </div> <!-- /.card-body -->
                <div class="card-body">
                    <form action="{{ ($information != null)?url('update-company'):url('save-company')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{($information !=null)?$information->name:''}}">
                        </div>
                        <div class="form-group">
                            <label for="company_address">Company Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{($information !=null)?$information->address:''}}">
                        </div>
                        <div class="form-group">
                            <label for="company_phone">Company Phone</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{($information !=null)?$information->contact_number:''}}">
                        </div>
                        <div class="form-group">
                            <label for="company_email">Company Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{($information !=null)?$information->email:''}}">
                        </div>
                        <div class="form-group">
                            <label for="company_website">Company Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{($information !=null)?$information->website:''}}">
                        </div>
                        <div class="form-group">
                            <label for="company_logo">Company Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>
                        @if ($information != null)
                        <div class="form-group">
                            <label for="logo">Company Logo</label>
                            <img src="{{asset($information->logo)}}" alt="">
                        </div>
                        <input type="hidden" name="id" value="{{$information->id}}">
                        @endif
                        
                        <div class="form-group">
                            <hr/>
                            @if ($information != null)
                            <button type="submit" class="btn btn-info float-right"><i class="fa fa-check"></i> Update</button>
                            @else
                            <button type="submit" class="btn btn-success float-right"><i class="fa fa-check"></i> Save</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection