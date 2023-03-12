@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 title-search" >
        
          <div class="col-sm-6 col-md-8">
          <p class="m-0 pt-2">DEALS / NEW DEAL</p>
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
                                <span class="at-tab-__title_text current">Client Information</span>
                              </div>
                            </a>
                          </div>
                          
                          
                      </div>
    <!-- top-tab-panel -->
                    <div class="at-tabs-content middel-tap-content">

                      <div class="at-tabs-content__item middel-client-tap-panel">
                        <form id="customer_form">
                            <div id="at-tabs-c2a3d74" class="at-tabs ">

                            <div class="at-tabs-nav sub-navbar sub-title-panel">
                                <div class="at-tabs-nav__item">
                                <a class="at-tabs-title" href="#">
                                    <div class="at-title-text-wrapper">
                                    <span class="at-tab-__title_text current">Basic information</span>
                                    </div>
                                </a>
                                </div>
                                <div class="at-tabs-nav__item">
                                <a class="at-tabs-title" href="#">
                                    <div class="at-title-text-wrapper">
                                    <span class="at-tab-__title_text">Family information</span>
                                    </div>
                                </a>
                                </div>
                                <div class="at-tabs-nav__item">
                                <a class="at-tabs-title" href="#">
                                    <div class="at-title-text-wrapper">
                                    <span class="at-tab-__title_text">Birth & passport information</span>
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
                                            <label for="exampleInputEmail1">NID</label>
                                            <input type="number" id="nid" name="nid" onchange="select_customer_data('nid',this.value)" class="form-control">
                                        </div>   
                                        </div>  
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Birth ID</label>
                                            <input type="number" id="birth_id" name="birth_id" class="form-control">
                                        </div>   
                                        </div> 
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile 1</label>
                                            <input type="number" id="mobile1" name="mobile1" class="form-control">
                                        </div>   
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile 2</label>
                                            <input type="number"  id="mobile2" name="mobile2" class="form-control">
                                        </div>   
                                        </div> <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" id="title" name="title" class="form-control">
                                        </div>   
                                        </div> <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sur name</label>
                                            <input type="text" class="form-control" id="sur_name" name="sur_name">
                                        </div>   
                                        </div> <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Given name</label>
                                            <input type="text" class="form-control" id="given_name" name="given_name">
                                        </div>   
                                        </div>
                                    </div>
                                    </div>
                                    <div class="at-tabs-content__item">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Father name</label>
                                            <input type="text" class="form-control" id="father_name" name="father_name">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mother name</label>
                                            <input type="text" class="form-control" id="mother_name" name="mother_name">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Spouse name</label>
                                            <input type="text" class="form-control" id="spouse_name" name="spouse_name">
                                        </div>
                                        </div> 
                                        <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label>Marital status</label>
                                            <select class="form-control select2" name="marital_status" id="marital_status" style="width: 100%;">
                                                <option selected="selected">Select one</option>
                                                <option value="Married">Married</option>
                                                <option value="Single">Single</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="at-tabs-content__item">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Passport No</label>
                                            <input type="text" class="form-control" id="passport_no" name="passport_no">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date of issue</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" id="date_of_issue"
                                                name="date_of_issue" data-target="#reservationdate"/>
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date Expire</label>
                                            <div class="input-group date" id="reservationdateone" data-target-input="nearest">
                                                <input type="text" id="date_of_expire"
                                                name="date_of_expire" class="form-control datetimepicker-input" data-target="#reservationdateone"/>
                                                <div class="input-group-append" data-target="#reservationdateone" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        </div> 
                                        <div class="col-md-4"> 
                                        <div class="form-group">
                                            <label>Date of birth</label>
                                            <div class="input-group date" id="reservationdatethree" data-target-input="nearest" >
                                                <input type="text" id="date_of_birth"
                                                name="date_of_birth" onblur="calculate_age()" class="form-control datetimepicker-input" data-target="#reservationdatethree"/>
                                                <div class="input-group-append" data-target="#reservationdatethree" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Age</label>
                                            <input type="number" class="form-control" id="age"
                                            name="age" placeholder="Age" readonly>
                                        </div>
                                        </div> 
                                    </div>
                                    </div> 
                                    <div class="at-tabs-content__item">
                                    <div class="row present-address">
                                        <p style="border-bottom: #000 solid 1px; font-size:19px ; margin: 2px 3px 25px 2px; width: 100%; display: block; font-weight: bold;">Present adderess</p>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                 <textarea rows="5" class="form-control" id="present_address" name="present_address"></textarea>
                                            </div>
                                        </div> 
                                         
                                        
                                    </div>
                                    <div class="row permanent-address">
                                        <p style="border-bottom: #000 solid 1px; font-size:19px; margin:2px 3px 25px 2px; width: 100%; display: block;font-weight: bold;">Permanent adderess</p>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea rows="5" class="form-control" id="permanent_address" name="permanent_address"></textarea>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Nationality</label>
                                            <select name="nationality" id="nationality" class="form-control select2">
                                                <option value="">Select One</option>
                                                @foreach ($countries as $item)
                                                <option value="{{ $item->nationality }}">{{ $item->nationality }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Blood Group</label>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Gender</label>
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
                                            <label for="exampleInputEmail1">Organization</label>
                                            <input type="text" class="form-control" id="organization"
                                                        name="organization" placeholder="Organization">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Designation</label>
                                            <input type="text" class="form-control" id="designation" name="designation"
                                                        placeholder="Designation">
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Email">
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
<script>
    function calculate_age(){
        var dateString = $('#date_of_birth').val();
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        
        $('#age').val(age);
    }

    function select_customer_data(field_name, field_value) {

    }

    var queryDone = false;
    var customerUpdate = false;
    var customerId = -1;

    $('#mobile1').on('blur', function (e) {
        if (!queryDone) {
            var value = e.target.value;

            getCustomerByMobileNo(value).then(function (result) {
                if (!result.error) {
                    showCustomerData(result.data);
                    queryDone = true;
                    customerId = result.data.id;
                    customerUpdate = true;
                }
            });
        }
    });

    $('#nid').on('blur', function (e) {
        if (!queryDone) {
            var value = e.target.value;

            getCustomerByNID(value).then(function (result) {
                if (!result.error) {
                    showCustomerData(result.data);
                    queryDone = true;
                    customerId = result.data.id;
                    customerUpdate = true;
                }
            });
        }
    });

    function getCustomerByMobileNo(mobileno) {
        return new Promise(function (resolve) {
            $.ajax({
                url: `/getCustomerByMobileNo/${mobileno}`,
                dataType: 'json',
                type: 'get',
                success: function (resp) {
                    resolve(resp);
                }
            });
        })

    }

    function getCustomerByNID(nid) {
        return new Promise(function (resolve) {
            $.ajax({
                url: `/getCustomerByNid/${nid}`,
                dataType: 'json',
                type: 'get',
                success: function (resp) {
                    resolve(resp);
                }
            });
        })

    }

    function showCustomerData(data) {
        nid.value = data.nid;
        birth_id.value = data.birth_id;
        mobile1.value = data.mobile1;
        mobile2.value = data.mobile2;
        title.value = data.title;
        sur_name.value = data.sur_name;
        given_name.value = data.given_name;
        father_name.value = data.father_name;
        mother_name.value = data.mother_name;
        marital_status.value = data.marital_status;
        spouse_name.value = data.spouse_name;
        gender.value = data.gender;
        nationality.value = data.nationality;
        religion.value = data.religion;
        blood_group.value = data.blood_group;
        passport_no.value = data.passport_no;
        date_of_birth.value = data.date_of_birth;
        date_of_issue.value = data.date_of_issue;
        present_address.value = data.present_address;
        permanent_address.value = data.permanent_address;
        organization.value = data.organization;
        designation.value = data.designation;
        email.value = data.email;
    }

    // function resetForm()
    // {
    //     nid.value = data.nid;
    //     birth_id.value = data.birth_id;
    //     mobile1.value = data.mobile1;
    //     mobile2.value = data.mobile2;
    //     title.value = data.title;
    //     sur_name.value = data.sur_name;
    //     given_name.value = data.given_name;
    //     father_name.value = data.father_name;
    //     mother_name.value = data.mother_name;
    //     marital_status.value = data.marital_status;
    //     spouse_name.value = data.spouse_name;
    //     gender.value = data.gender;
    //     nationality.value = data.nationality;
    //     religion.value = data.religion;
    //     blood_group.value = data.blood_group;
    //     passport_no.value = data.passport_no;
    //     date_of_birth.value = data.date_of_birth;
    //     date_of_issue.value = data.date_of_issue;
    //     present_address.value = data.present_address;
    //     permanent_address.value = data.permanent_address;
    //     organization.value = data.organization;
    //     designation.value = data.designation;
    //     email.value = data.email;
    // }

    $('#customer_form').on('submit', function (e) {
        e.preventDefault();

        var data = $('#customer_form').serialize();
        console.log(data);
        let url = '';
        if (!customerUpdate) {
            url = "/customer";
            type = "post";
        }
        else {
            url = "/customer/" + customerId;
            type = "put";
        }

        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function (resp) {
                var result = $.parseJSON(resp);

                if(result.error)
                {
                    toastr.error(result.message);
                }
                else{
                    toastr.success(result.message);
                    if(result.hasOwnProperty('redirect'))
                    {
                        window.location = result.redirect;
                    }
                }
            }
        });

    });


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