@extends('admin.common.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Certificate Edit Form</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form name="myform" method="Post" action="{{route('gurudwara.certificateeditconfirm')}}">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$user_details->id}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" readonly name="surname" value="{{$user_details1->surname}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" readonly name="givenname" value="{{$user_details1->givenname}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Gender</label>
                                <!-- {{$user_details->gender}} -->
                                <select name="gender" id="gender" class="form-control" disabled>
                                        <option value="M" <?php if($user_details1->gender=="M"){echo 'selected';}else{echo '';}?>>Male</option>
                                        <option value="F" <?php if($user_details1->gender=="F"){echo 'selected';}else{echo '';}?>>Female</option>
                                        <option value="O" <?php if($user_details1->gender=="O"){echo 'selected';}else{echo '';}?>>Other</option>
                                </select>
                                <!-- <input type="text" name="gender" id="gender" value="{{$user_details->gender}}" class="form-control" placeholder="Enter ..."> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>DOB</label>
                                
                                <input type="text" readonly name="date_of_birth" value="{{$user_details1->date_of_birth}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Birth Place</label>
                                <input type="text" readonly name="birth_place" value="{{$user_details1->birth_place}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Country of Birth </label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select disabled name="birth_country" id="birth_country" class="form-control" disabled>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details1->birth_country){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nationality</label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select name="nationality" id="nationality" class="form-control" disabled>
                                        <option value="" > --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details1->nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Previous Nationality</label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select name="previous_nationality" id="previous_nationality" class="form-control" disabled>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details1->previous_nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Marital Status</label>
                                <!-- <input type="text" name="marital_status" value="" class="form-control" placeholder="Enter ..."> -->
                                <select name="marital_status" id="marital_status" class="form-control" disabled>
                                        <option value=""> --Select marital status-- </option>
                                        <option value="Unmarried" <?php if($user_details1->marital_status=="Unmarried"){echo "selected";}else{echo "";}?>>Unmarried</option>
                                        <option value="Married" <?php if($user_details1->marital_status=="Married"){echo "selected";}else{echo "";}?>>Married</option>
                                        <option value="Widowed" <?php if($user_details1->marital_status=="Widowed"){echo "selected";}else{echo "";}?>>Widowed</option>
                                        <option value="Divorced"<?php if($user_details1->marital_status=="Divorced"){echo "selected";}else{echo "";}?>>Divorced</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Religion</label>
                                <input type="text" name="religion" value="{{$user_details1->religion}}" readonly class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Present Address</label>
                                <input type="text" readonly name="present_address" value="{{$user_details1->present_address}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Profession</label>
                                <input type="text" readonly name="profession" value="{{$user_details1->profession}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Father`s Name</label>
                                <input type="text" readonly name="father_name" value="{{$user_details1->father_name}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Father`s Nationality</label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select name="father_nationality" id="father_nationality" class="form-control" disabled>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details1->father_nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Father`s Previous Nationality</label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select name="father_prev_nationality" id="father_prev_nationality" class="form-control" disabled>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details1->father_prev_nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Father`s Birth Country</label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select name="father_birth_country" id="father_birth_country" class="form-control"disabled >
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details1->father_birth_country){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" readonly name="mobile" value="{{$user_details1->mobile}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" readonly name="email" value="{{$user_details1->email}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>father_nationality</label>
                                <select name="father_nationality" id="father_nationality" class="form-control" >
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Other Info</label>
                                <textarea name="other_info" class="form-control" disabled>{{$user_details->remark}}</textarea>
                                <!-- <input type="text" name="other_info" class="form-control" placeholder="Enter ..."> -->
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <!-- <label>email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter ..."> -->
                            </div>
                        </div>
                        
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>father_nationality</label>
                                <select name="father_nationality" id="father_nationality" class="form-control" >
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div> -->
                    </div>

                    <!-- Family details -->
                    @if(isset($family_details)) 
                    <!-- {{'fgdgdgddr'}} -->
                    <label>Family Details</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" readonly name="email" value="{{$family_details->email}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" readonly name="first_name" value="{{$family_details->first_name}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" readonly name="middle_name" value="{{$family_details->middle_name}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" readonly name="last_name" value="{{$family_details->last_name}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" readonly id="gender" class="form-control">
                                    <option value="M" <?php if( isset($family_details) && $family_details->gender=='M'){ echo "selected";}?>>Male</option>
                                    <option value="F" <?php if( isset($family_details) && $family_details->gender=='F'){ echo "selected";}?>>Female</option>
                                    <option value="O" <?php if( isset($family_details) && $family_details->gender=='O'){ echo "selected";}?>>Other</option>
                                   
                                </select>                      
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Relation</label>
                                <select name="relation" readonly id="relation" class="form-control">
                                    <option value="Father" <?php if( isset($family_details) && $family_details->relation=='Father'){ echo "selected";}?>>Father</option>
                                    <option value="Mother" <?php if( isset($family_details) && $family_details->relation=='Mother'){ echo "selected";}?>>Mother</option>
                                    <option value="Son" <?php if( isset($family_details) && $family_details->relation=='Son'){ echo "selected";}?>>Son</option>
                                    <option value="Daughter" <?php if( isset($family_details) && $family_details->relation=='Daughter'){ echo "selected";}?>>Daughter</option>
                                    <option value="Spouse" <?php if( isset($family_details) && $family_details->relation=='Spouse'){ echo "selected";}?>>Spouse</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Current Citizenship</label>
                                <select readonly name="current_citizenship" id="current_citizenship" class="form-control" required>
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}" <?php if(isset($family_details) && $family_details->current_citizenship==$countries->id){ echo "selected";}?>>{{$countries->name}}</option>
                                            @endforeach
                                        </select>                  
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Previous Citizenship</label>
                                <select readonly name="previous_citizenship" id="previous_citizenship" required class="form-control">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}" <?php if( isset($family_details) && $family_details->previous_citizenship==$countries->id){ echo "selected";}?>>{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Passport Number</label>
                                <input type="text" readonly name="passport_no" value="{{$family_details->passport_no}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Passport Date of Issue</label>
                                <input type="text" readonly name="passport_date_of_issue" id="passport_date_of_issue" value="{{$family_details->passport_date_of_issue}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Passport Date of Expiry</label>
                                <input type="text" readonly name="passport_date_of_expiry" id="passport_date_of_expiry" value="{{$family_details->passport_date_of_expiry}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Afghan Id</label>
                                <input type="text" readonly name="afghan_id" value="{{$family_details->afghan_id}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    @endif


                    <div class="row">
                        @if(isset($user_details->doc_1))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document 1</label>
                                <img src="{{asset('public/certificate-doc').'/'.$user_details->doc_1}}" width="100" height="100"  />
                                &nbsp;
                                <a href="{{asset('public/certificate-doc').'/'.$user_details->doc_1}}" download="{{$user_details->doc_1}}"><i class="fas fa-file-download"></i></a>
                                <!-- <a href="{{route('admin.userdocdownload',['link'=>$user_details->doc_1])}}" target="_blank"><i class="fas fa-file-download"></i></a> -->
                            </div>
                        </div>
                        @endif
                        @if(isset($user_details->doc_2))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document 2</label>
                                <img src="{{asset('public/certificate-doc').'/'.$user_details->doc_2}}" width="100" height="100"  />
                                &nbsp;
                                &nbsp;
                                <a href="{{asset('public/certificate-doc').'/'.$user_details->doc_2}}" download="{{$user_details->doc_2}}"><i class="fas fa-file-download"></i></a>
                                
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        @if(isset($user_details->doc_3) && $user_details->doc_3!='')
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document 3</label>
                                <img src="{{asset('public/certificate-doc').'/'.$user_details->doc_3}}" width="100" height="100"  />
                                &nbsp;
                                <a href="{{asset('public/certificate-doc').'/'.$user_details->doc_3}}" download="{{$user_details->doc_3}}"><i class="fas fa-file-download"></i></a>
                                
                            </div>
                        </div>
                        @endif
                        @if(isset($user_details->doc_4) && $user_details->doc_4!='')
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document 4</label>
                                <img src="{{asset('public/certificate-doc').'/'.$user_details->doc_4}}" width="100" height="100"  />
                                &nbsp;
                                <a href="{{asset('public/certificate-doc').'/'.$user_details->doc_4}}" download="{{$user_details->doc_4}}"><i class="fas fa-file-download"></i></a>
                                
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Issue Certificate</label>
                                <select name="status" id="status" required class="form-control" required>
                                    <option value=""> -- Issue Certificate -- </option>
                                    <option value="Y" >Yes</option>
                                    <option value="N" >No</option>
                                   
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Assign Gurdwara </label>
                                <select name="gurudwara_id" id="gurudwara_id" class="form-control" required>
                                        <option value=""> -- Select Gurdwara -- </option>
                                        @foreach($gurudwara as $countries)
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details->gurudwara_id){echo "selected";}else{echo '';}?>>{{$countries->gurudwara_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Admin Remarks</label>
                                <textarea class="form-control" id="remark" name="remark" rows="6" >{{$user_details->admin_remark}}</textarea>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="card-footer">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
          
            <!-- /.card -->

            <!-- Input addon -->
           
            <!-- /.card -->
            <!-- Horizontal Form -->
            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')
<script>
    $(document).ready(function(){
        // alert("hii");
        $('#reject').click(function(){
            $('#gurudwara_id').removeAttr('required');
            $('#gurudwara_id').val('');
            $('#gurudwara_id').attr('disabled');

        })
        $('#css').click(function(){
            $('#gurudwara_id').attr('required','required');
            $('#gurudwara_id').removeAttr('disabled');
        })

        // $("#passport_date_of_issue").daterangepicker({
        //     autoUpdateInput: false,
        //     minYear: 1901,
        //     maxDate: new Date(),
        //     autoApply:true,
        //     showDropdowns: true,
        //     singleDatePicker: true,
        //     timePicker: false,
        //     timePicker24Hour: false,
        //     timePickerIncrement: 05,
        //     drops: "up",
        //     locale: {
        //         format: 'DD/MM/YYYY'
        //     }
        // }).on("apply.daterangepicker", function (e, picker) {
        //     picker.element.val(picker.startDate.format(picker.locale.format));
        // });

        // $("#passport_date_of_expiry").daterangepicker({
        //     autoUpdateInput: false,
        //     minYear: 1901,
        //     minDate: new Date(),
        //     autoApply:true,
        //     showDropdowns: true,
        //     singleDatePicker: true,
        //     timePicker: false,
        //     timePicker24Hour: false,
        //     timePickerIncrement: 05,
        //     drops: "up",
        //     locale: {
        //         format: 'DD/MM/YYYY'
        //     }
        // }).on("apply.daterangepicker", function (e, picker) {
        //     picker.element.val(picker.startDate.format(picker.locale.format));
        // });
    });
</script>

@endsection
