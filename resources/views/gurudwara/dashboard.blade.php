@extends('admin.common.master')
@section('content')

@foreach($data as $datas)
@endforeach
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Your Profile  
            <!-- {{Session::get('gurudwara')[0]['active']}} -->
            
            @if(Session::get('gurudwara')[0]['active']=="I")
            {{"Pending for approval"}}
            @elseif(Session::get('gurudwara')[0]['active']=="OH")
            {{'On Hold'}}
            @elseif(Session::get('gurudwara')[0]['active']=="AD")
            {{'Awaiting document upload'}}
            @elseif(Session::get('gurudwara')[0]['active']=="AR")
            {{'Awaiting Rectifications'}}
            @elseif(Session::get('gurudwara')[0]['active']=="A")
            {{"Approved"}}
            @elseif(Session::get('gurudwara')[0]['active']=="R")
            {{"Rejected"}}
            @endif
          </h1>
        </div><!-- /.col -->

        <!-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div> -->
        
        <!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-squre profileImgCus"
                       src="@if(isset($datas->gurudwara_photo)){{asset('public/gurudwara-image').'/'.$datas->gurudwara_photo}}@else{{asset('public/img/user.png')}}@endif"
                       alt="Gurdwara Logo">
                </div>
                <h3 class="profile-username text-center">{{isset($datas->surname)?$datas->surname:''}} {{isset($datas->givenname)?$datas->givenname:''}}</h3>
                <!-- <p class="text-muted text-center">Software Engineer</p> -->
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> 
                    <a class="float-right">{{$datas->user_id}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> 
                    <a class="float-right">{{isset($datas->gurudwara_phone_no)?$datas->gurudwara_phone_no:''}}</a>
                  </li>
                  <!-- @if(isset($datas->date_of_birth))
                  <li class="list-group-item">
                    <b>Date of Birth</b> 
                    <a class="float-right">{{isset($datas->date_of_birth)?$datas->date_of_birth:''}}</a>
                  </li>
                  @endif  -->
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_2" data-toggle="tab">Address</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_3" data-toggle="tab">Gurdwara Head Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_4" data-toggle="tab">Documents</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#stage_5" data-toggle="tab">Stage 5</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_6" data-toggle="tab">Stage 6</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_7" data-toggle="tab">Stage 7</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_8" data-toggle="tab">Stage 8</a></li> -->
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#settings1" data-toggle="tab">Upload Profile Image</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" method="POST" action="{{route('gurudwara.editstage1')}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Gurdwara Name: *</label>
                        <div class="col-sm-10">
                          <input type="text" name="gurudwara_name" id="gurudwara_name" value="{{isset($datas->gurudwara_name)? $datas->gurudwara_name:''}}" required class="form-control" placeholder="Gurdwara Name:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Website: </label>
                        <div class="col-sm-10">
                          <input type="text" name="website" class="form-control" id="website" value="{{isset($datas->website)? $datas->website:''}}" placeholder="website:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Phone No: </label>
                        <div class="col-sm-10">
                          <input type="number" required name="gurudwara_phone_no" id="gurudwara_phone_no" class="form-control" value="{{isset($datas->gurudwara_phone_no)? $datas->gurudwara_phone_no:''}}"  placeholder="Phone no" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="stage1" name="stage1" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- satage 2 -->
                  <div class="tab-pane" id="stage_2">
                    <form class="form-horizontal" method="POST" action="{{route('gurudwara.editstage2')}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Adress Line 1: *</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{isset($datas->gurudwara_address)? $datas->gurudwara_address:''}}" name="gurudwara_address" required class="form-control" id="gurudwara_address" placeholder="Adress Line 1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Adress Line 2: </label>
                        <div class="col-sm-10">
                          <input type="text" value="{{isset($datas->gurudwara_address_2)? $datas->gurudwara_address_2:''}}" name="gurudwara_address_2" class="form-control" id="gurudwara_address_2" placeholder="Adress Line 2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">City: *</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{isset($datas->city)? $datas->city:''}}" name="city" required class="form-control" id="city" placeholder="city" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Postal/zip code: *</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{isset($datas->post_code)? $datas->post_code:''}}" name="post_code" required class="form-control" id="post_code" placeholder="post code" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Country: *</label>
                        <div class="col-sm-10">
                          <select name="country" id="country" required class="form-control">
                                        <option value=""> --Select Country-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->country) && $datas->country==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>                 
                        </div>
                      </div>
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="stage2" name="stage2" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- stage 3 -->
                  <div class="tab-pane" id="stage_3">
                    <form class="form-horizontal" method="POST" action="{{route('gurudwara.editstage3')}}">
                      @csrf
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Gurdwara Head Name: *</label>
                        <div class="col-sm-10">
                         <input type="text" value="{{isset($datas->gurudwara_head_name)? $datas->gurudwara_head_name:''}}" name="gurudwara_head_name" required class="form-control" id="gurudwara_head_name" placeholder="gurudwara head name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
             
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Gurdwara Head Address:</label>
                        <div class="col-sm-10">
                        <input type="text" value="{{isset($datas->gurudwara_head_address)? $datas->gurudwara_head_address:''}}" name="gurudwara_head_address" class="form-control" id="gurudwara_head_address" placeholder="gurudwara head address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                      </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Gurdwara Head Phone No: *</label>
                        <div class="col-sm-10">
                         <input type="number" value="{{isset($datas->gurudwara_head_phone_no)? $datas->gurudwara_head_phone_no:''}}" name="gurudwara_head_phone_no" required class="form-control" id="gurudwara_head_phone_no" placeholder="Phone no" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Gurdwara Head Email Id: *</label>
                        <div class="col-sm-10">
                         <input type="text" value="{{isset($datas->gurudwara_head_email)? $datas->gurudwara_head_email:''}}" name="gurudwara_head_email" required class="form-control" id="gurudwara_head_email" placeholder="gurudwara head email" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                        </div>
                      </div>
                      
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="stage3" name="stage3" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- stage 4 -->
                  <div class="tab-pane" id="stage_4">
                    <form class="form-horizontal" method="POST" action="{{route('gurudwara.editstage4')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Other Information : </label>
                        <div class="col-sm-10">
                        <textarea name="other_doc" id="other_doc" class="form-control">{{$datas->other_doc}}</textarea>

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Upload Document 1 : *</label>
                        <div class="col-sm-10">
                          <input type="file"  name="doc_1" id="doc_1" accept="image/gif, image/jpg, image/jpeg, application/pdf" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Upload Document 2 : *</label>
                        <div class="col-sm-10">
                          <input type="file"  name="doc_2" id="doc_2" accept="image/gif, image/jpg, image/jpeg, application/pdf" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Upload Document 3 : *</label>
                        <div class="col-sm-10">
                          <input type="file"  name="doc_3" id="doc_3" accept="image/gif, image/jpg, image/jpeg, application/pdf" class="form-control" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Upload Document 4 : *</label>
                        <div class="col-sm-10">
                          <input type="file"  name="doc_4" id="doc_4" accept="image/gif, image/jpg, image/jpeg, application/pdf" class="form-control" />
                        </div>
                      </div>
                      
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="stage3" name="stage3" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                 

                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="post" action="{{route('gurudwara.chnagepass')}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Old Password: *</label>
                        <div class="col-sm-10">
                          <input type="password" required class="form-control" name="old_pass" id="old_pass" placeholder="Old Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">New Password: *</label>
                        <div class="col-sm-10">
                          <input type="password" required class="form-control" name="new_pass"  id="new_pass" placeholder="New Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Confirm Password: *</label>
                        <div class="col-sm-10">
                          <input type="password" required class="form-control" name="con_pass" id="con_pass" placeholder="Confirm Password">
                        </div>
                      </div>
                      
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane" id="settings1">
                    <form class="form-horizontal" method="post" action="{{route('user.logoupload')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Upload Profile Image: * (.jpeg/.jpg/.png, max size 2mb)</label>
                        <div class="col-sm-10">
                          <input type="file" required class="form-control" name="user_logo" id="user_logo" placeholder="Old Password" accept="image/gif, image/jpg, image/jpeg, application/pdf">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection