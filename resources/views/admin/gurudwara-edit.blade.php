@extends('admin.common.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gurdwara Edit Form</h1>
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
              <form name="myform" method="Post" action="{{route('admin.gurudwaraeditconfirm')}}">
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($user_details->id)?$user_details->id:''}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gurdwara Email</label>
                                <input type="text" readonly name="gurudwara_email" value="{{isset($user_details->gurudwara_email)?$user_details->gurudwara_email:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Gurdwara Name</label>
                                <input type="text" readonly name="gurudwara_name" value="{{isset($user_details->gurudwara_name)?$user_details->gurudwara_name:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gurudwara Phone No</label>
                                <input type="text" readonly name="gurudwara_phone_no" value="{{isset($user_details->gurudwara_phone_no)?$user_details->gurudwara_phone_no:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Website</label>
                                
                                <input type="text" readonly name="website" value="{{isset($user_details->website)?$user_details->website:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Gurdwara Address</label>
                                <textarea class="form-control" readonly name="gurudwara_address">{{isset($user_details->gurudwara_address)?$user_details->gurudwara_address:''}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" readonly value="{{isset($user_details->city)?$user_details->city:''}}" class="form-control" placeholder="Enter ...">
                                <!-- <select disabled name="birth_country" id="city" " class="form-control" >
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($user_details->birth_country) && $countries->id==$user_details->birth_country){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" name="state" readonly value="{{isset($user_details->state)?$user_details->state:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Country</label>
                                <!-- <input type="text" class="form-control" placeholder="Enter ..."> -->
                                <select name="previous_nationality" id="previous_nationality" class="form-control" disabled>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($user_details->country) && $countries->id==$user_details->country){echo "selected";}else{echo "";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Gurdwara Head Name</label>
                                <input type="text" name="gurudwara_head_name" readonly value="{{isset($user_details->gurudwara_head_name)?$user_details->gurudwara_head_name:''}}" class="form-control" placeholder="Enter ...">
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gurdwara Head Address</label>
                                <textarea class="form-control" name="gurudwara_head_address" readonly>{{isset($user_details->gurudwara_head_address)?$user_details->gurudwara_head_address:''}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>gurudwara_head_phone_no</label>
                                <input type="text" readonly name="gurudwara_head_phone_no" value="{{isset($user_details->gurudwara_head_phone_no)?$user_details->gurudwara_head_phone_no:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gurdwara Head Email</label>
                                <input type="text" readonly name="gurudwara_head_email" value="{{isset($user_details->gurudwara_head_email)?$user_details->gurudwara_head_email:''}}" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
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
                                <label>Status</label>
                                <select name="status" id="status" required class="form-control" required>
                                    <option value=""> -- Select Status -- </option>
                                    <option value="I" <?php if(isset($user_details1->active) && $user_details1->active=='I'){echo "selected";}?>>Pending for approval</option>
                                    <option value="OH" <?php if(isset($user_details1->active) && $user_details1->active=='OH'){echo "selected";}?>>On Hold</option>
                                    <option value="AD" <?php if(isset($user_details1->active) && $user_details1->active=='AD'){echo "selected";}?>>Awaiting document upload</option>
                                    <option value="AR" <?php if(isset($user_details1->active) && $user_details1->active=='AR'){echo "selected";}?>>Awaiting Rectifications</option>
                                    <option value="R" <?php if(isset($user_details1->active) && $user_details1->active=='R'){echo "selected";}?>>Reject</option>
                                    <option value="A" <?php if(isset($user_details1->active) && $user_details1->active=='A'){echo "selected";}?>>Approved</option>
                                    <!-- <option value=""></option> -->
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Admin Remarks</label>
                                <textarea class="form-control" id="remark" name="remark" rows="6">{{isset($user_details->remark)?$user_details->remark:''}}</textarea>
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
                  <button type="submit" id="submit" name="submit" class="btn btn-primary" >Submit</button>
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
