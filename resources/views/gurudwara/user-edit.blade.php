@extends('admin.common.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Edit Form</h1>
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
              <form name="myform" method="Post" action="{{route('gurudwara.usereditconfirm')}}">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$user_details->id}}"/>
                <div class="card-body" id="sectionDiv">
                    @if(Session::has('success'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <center><label style="color:green;">Member details updated successfully!</label></center>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Surname</label>
                                <input type="text" readonly name="surname" value="{{$user_details->surname}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Given Name</label>
                                <input type="text" readonly name="givenname" value="{{$user_details->givenname}}" class="form-control" placeholder="Enter ...">
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
                                        <option value="M" <?php if($user_details->gender=="M"){echo 'selected';}else{echo '';}?>>Male</option>
                                        <option value="F" <?php if($user_details->gender=="F"){echo 'selected';}else{echo '';}?>>Female</option>
                                        <option value="O" <?php if($user_details->gender=="O"){echo 'selected';}else{echo '';}?>>Other</option>
                                </select>
                                <!-- <input type="text" name="gender" id="gender" value="{{$user_details->gender}}" class="form-control" placeholder="Enter ..."> -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>DOB</label>
                                
                                <input type="text" readonly name="date_of_birth" value="{{$user_details->date_of_birth}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Birth Place</label>
                                <input type="text" readonly name="birth_place" value="{{$user_details->birth_place}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Country of Birth </label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select disabled name="birth_country" id="birth_country" class="form-control" disabled>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details->birth_country){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details->nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details->previous_nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="Unmarried" <?php if($user_details->marital_status=="Unmarried"){echo "selected";}else{echo "";}?>>Unmarried</option>
                                        <option value="Married" <?php if($user_details->marital_status=="Married"){echo "selected";}else{echo "";}?>>Married</option>
                                        <option value="Widowed" <?php if($user_details->marital_status=="Widowed"){echo "selected";}else{echo "";}?>>Widowed</option>
                                        <option value="Divorced"<?php if($user_details->marital_status=="Divorced"){echo "selected";}else{echo "";}?>>Divorced</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Religion</label>
                                <input type="text" name="religion" value="{{$user_details->religion}}" readonly class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Present Address</label>
                                <input type="text" readonly name="present_address" value="{{$user_details->present_address}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div> -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Profession</label>
                                <input type="text" readonly name="profession" value="{{$user_details->profession}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>House No/Name</label>
                                <input type="text" required name="add_1" value="{{isset($user_details)?$user_details->add_1:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Street Name</label>
                                <input type="text" required  name="add_2" value="{{isset($user_details)?$user_details->add_2:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" required  name="city" value="{{isset($user_details)?$user_details->city:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>County</label>
                                <input type="text" required  name="county" value="{{isset($user_details)?$user_details->county:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Postal/zip code</label>
                                <input type="text" required  name="postcode" value="{{isset($user_details)?$user_details->postcode:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Country</label>
                                <!-- <input type="text" required readonly name="profession" value="{{isset($user_details)?$user_details->county:''}}" class="form-control" placeholder="Enter ..."> -->
                                <select name="country" id="country" required class="form-control">
                                    <option value="">-- Select Country --</option>
                                    @foreach($country as $countries)
                                    <option value="{{$countries->id}}" <?php if(isset($user_details) && $user_details->country==$countries->id){echo "selected";}?> >{{$countries->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Father`s Name</label>
                                <input type="text" readonly name="father_name" value="{{$user_details->father_name}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Father`s Nationality</label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select name="father_nationality" id="father_nationality" class="form-control" disabled>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details->father_nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details->father_prev_nationality){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
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
                                        <option value="{{$countries->id}}" <?php if($countries->id==$user_details->father_birth_country){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" required name="phone" value="{{$user_details->phone}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" required name="email" value="{{$user_details->email}}" class="form-control" placeholder="Enter ...">
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
                                <textarea name="other_info" class="form-control" disabled>{{$user_details->other_info}}</textarea>
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
                                <a href="{{asset('public/user-doc').'/'.$user_details->doc_1}}" download="{{$user_details->doc_1}}"><i class="fas fa-file-download"></i></a>
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
                                <a href="{{asset('public/user-doc').'/'.$user_details->doc_2}}" download="{{$user_details->doc_2}}"><i class="fas fa-file-download"></i></a>
                                
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
                                <a href="{{asset('public/user-doc').'/'.$user_details->doc_3}}" download="{{$user_details->doc_3}}"><i class="fas fa-file-download"></i></a>
                                
                            </div>
                        </div>
                        @endif
                        @if(isset($user_details->doc_4))
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Document 4</label>
                                <img src="{{asset('public/user-doc').'/'.$user_details->doc_4}}" width="100" height="100"  />
                                &nbsp;
                                <a href="{{asset('public/user-doc').'/'.$user_details->doc_4}}" download="{{$user_details->doc_4}}"><i class="fas fa-file-download"></i></a>
                                
                            </div>
                        </div>
                        @endif
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
                  <!-- <button type="submit" id="submit" name="submit" class="btn btn-primary" onclick="printContent('sectionDiv');">Print </button> -->
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
    function printContent(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
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
