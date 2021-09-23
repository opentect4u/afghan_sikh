@extends('admin.common.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit User</h1>
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
              <form name="myform" method="Post" action="{{route('admin.usereditconfirm')}}">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$user_details1->id}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" readonly name="surname" value="{{isset($user_details->surname)?$user_details->surname:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" readonly name="givenname" value="{{isset($user_details->givenname)?$user_details->givenname:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control" disabled>
                                        <option value="M" <?php if(isset($user_details->gender) && $user_details->gender=="M"){echo 'selected';}else{echo '';}?>>Male</option>
                                        <option value="F" <?php if(isset($user_details->gender) && $user_details->gender=="F"){echo 'selected';}else{echo '';}?>>Female</option>
                                        <option value="O" <?php if(isset($user_details->gender) && $user_details->gender=="O"){echo 'selected';}else{echo '';}?>>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>DOB</label>
                                
                                <input type="text" readonly name="date_of_birth" value="{{isset($user_details->date_of_birth)?$user_details->date_of_birth:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Birth Place</label>
                                <input type="text" readonly name="birth_place" value="{{isset($user_details->birth_place)?$user_details->birth_place:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Country of Birth </label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select disabled name="birth_country" id="birth_country" class="form-control" disabled>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($user_details->birth_country) && $countries->id==$user_details->birth_country){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="{{$countries->id}}" <?php if(isset($user_details->nationality) && $countries->id==$user_details->nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="{{$countries->id}}" <?php if(isset($user_details->previous_nationality) && $countries->id==$user_details->previous_nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="Unmarried" <?php if(isset($user_details->marital_status) && $user_details->marital_status=="Unmarried"){echo "selected";}else{echo "";}?>>Unmarried</option>
                                        <option value="Married" <?php if(isset($user_details->marital_status) && $user_details->marital_status=="Married"){echo "selected";}else{echo "";}?>>Married</option>
                                        <option value="Widowed" <?php if(isset($user_details->marital_status) && $user_details->marital_status=="Widowed"){echo "selected";}else{echo "";}?>>Widowed</option>
                                        <option value="Divorced"<?php if(isset($user_details->marital_status) && $user_details->marital_status=="Divorced"){echo "selected";}else{echo "";}?>>Divorced</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Religion</label>
                                <input type="text" name="religion" value="{{isset($user_details->religion)?$user_details->religion:''}}" readonly class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Present Address</label>
                                <input type="text" readonly name="present_address" value="{{isset($user_details->present_address)?$user_details->present_address:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Profession</label>
                                <input type="text" readonly name="profession" value="{{isset($user_details->profession)?$user_details->profession:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Father`s Name</label>
                                <input type="text" readonly name="father_name" value="{{isset($user_details->father_name)?$user_details->father_name:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Father`s Nationality</label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select name="father_nationality" id="father_nationality" class="form-control" disabled>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($user_details->father_nationality) && $countries->id==$user_details->father_nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="{{$countries->id}}" <?php if(isset($user_details->father_prev_nationality) && $countries->id==$user_details->father_prev_nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="{{$countries->id}}" <?php if( isset($user_details->father_birth_country) && $countries->id==$user_details->father_birth_country){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                <input type="text" readonly name="phone" value="{{isset($user_details->phone)?$user_details->phone:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" readonly name="email" value="{{isset($user_details->email)?$user_details->email:''}}" class="form-control" placeholder="Enter ...">
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
                                <textarea name="other_info" class="form-control" disabled>{{isset($user_details->other_info)?$user_details->other_info:''}}</textarea>
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
                    <div class="row">
                        @if(isset($user_details->doc_1))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document 1</label>
                                <img src="{{asset('public/user-doc').'/'.$user_details->doc_1}}" width="100" height="100"  />
                                &nbsp;
                                <a href="{{asset('public/user-doc').'/'.$user_details->doc_1}}" download="logo"><i class="fas fa-file-download"></i></a>
                                <!-- <a href="{{route('admin.userdocdownload',['link'=>$user_details->doc_1])}}" target="_blank"><i class="fas fa-file-download"></i></a> -->
                            </div>
                        </div>
                        @endif
                        @if(isset($user_details->doc_2))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document 2</label>
                                <img src="{{asset('public/user-doc').'/'.$user_details->doc_2}}" width="100" height="100"  />
                                &nbsp;
                                &nbsp;
                                <a href="{{asset('public/user-doc').'/'.$user_details->doc_2}}" download="logo"><i class="fas fa-file-download"></i></a>
                                
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        @if(isset($user_details->doc_3))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document 3</label>
                                <img src="{{asset('public/user-doc').'/'.$user_details->doc_3}}" width="100" height="100"  />
                                &nbsp;
                                <a href="{{asset('public/user-doc').'/'.$user_details->doc_3}}" download="logo"><i class="fas fa-file-download"></i></a>
                                
                            </div>
                        </div>
                        @endif
                        @if(isset($user_details->doc_4))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document 4</label>
                                <img src="{{asset('public/user-doc').'/'.$user_details->doc_4}}" width="100" height="100"  />
                                &nbsp;
                                <a href="{{asset('public/user-doc').'/'.$user_details->doc_4}}" download="logo"><i class="fas fa-file-download"></i></a>
                                
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Status : <?php if(isset($user_details1->active) && $user_details1->active=='I'){echo "Pending for approval";}?>
 <?php if(isset($user_details1->active) && $user_details1->active=='OH'){echo "On Hold";}?>
 <?php if(isset($user_details1->active) && $user_details1->active=='AD'){echo "Awaiting document upload";}?>
 <?php if(isset($user_details1->active) && $user_details1->active=='AR'){echo "Awaiting Rectifications";}?>
<?php if(isset($user_details1->active) && $user_details1->active=='R'){echo "Reject";}?>
<?php if(isset($user_details1->active) && $user_details1->active=='A'){echo "Approved";}?></label>
                                <select name="status" id="status" required class="form-control" required>
                                    <option value=""> -- Select Status -- </option>
                                    <option value="I" <?php if($user_details1->active=='I'){echo "selected";}?>>Pending for approval</option>
                                    <option value="OH" <?php if($user_details1->active=='OH'){echo "selected";}?>>On Hold</option>
                                    <option value="AD" <?php if($user_details1->active=='AD'){echo "selected";}?>>Awaiting document upload</option>
                                    <option value="AR" <?php if($user_details1->active=='AR'){echo "selected";}?>>Awaiting Rectifications</option>
                                    <option value="R" <?php if($user_details1->active=='R'){echo "selected";}?>>Reject</option>
                                    <option value="A" <?php if($user_details1->active=='A'){echo "selected";}?>>Approved</option>
                                    <!-- <option value=""></option> -->
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Assign Gurdwara </label>
                                <select name="gurudwara_id" id="gurudwara_id" class="form-control">
                                        <option value=""> -- Select Gurdwara -- </option>
                                        @foreach($gurudwara as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($user_details->gurudwara_id) && $countries->id==$user_details->gurudwara_id){echo "selected";}else{echo '';}?>>{{$countries->gurudwara_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                       
                       
                        
                        
                    </div>
                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Admin Remarks</label>
                                <textarea class="form-control" id="remark" name="remark" rows="6" >{{isset($user_details->remark)?$user_details->remark:''}}</textarea>
                            </div>
                        </div>

                        
                       
                       
                        
                        
                    </div>

                  <!-- <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                   -->
                 
                </div>
                <!-- /.card-body -->

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
    });
</script>

@endsection
