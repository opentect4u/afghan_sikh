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
              <form name="myform" method="Post" action="{{route('admin.usereditconfirm')}}">
                @csrf
                <input type="hidden" id="id" name="id" value="{{$user_details->id}}"/>
                <div class="card-body">
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
                                <label>First Name</label>
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
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Present Address</label>
                                <input type="text" readonly name="present_address" value="{{$user_details->present_address}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
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
                                <label>Mobile</label>
                                <input type="text" readonly name="mobile" value="{{$user_details->mobile}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" readonly name="email" value="{{$user_details->email}}" class="form-control" placeholder="Enter ...">
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Assign Gurudwara </label>
                                <select name="gurudwara_id" id="gurudwara_id" class="form-control" required>
                                        <option value=""> -- Select Gurudwara -- </option>
                                        @foreach($gurudwara as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Status</label>
                                </br>
                                <!-- <input type="radio" id="html" name="active" value="I" <?php if($user_details->active=="I"){echo "checked";}else{echo '';}?>>
                                <label for="html">Pending</label>&nbsp;&nbsp; -->
                            <input type="radio" id="css" name="active" value="A" <?php if($user_details->active=="A"){echo "checked";}else{echo '';}?>>
                                <label for="html"> Active</label>&nbsp;&nbsp;<input type="radio" id="css" name="active" value="R" <?php if($user_details->active=="R"){echo "checked";}else{echo '';}?>>
                                <label for="css">Reject</label>
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