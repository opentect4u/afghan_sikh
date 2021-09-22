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

          @if(Session::get('user')[0]['active']=="I")
            {{"Pending for approval"}}
            @elseif(Session::get('user')[0]['active']=="OH")
            {{'On Hold'}}
            @elseif(Session::get('user')[0]['active']=="AD")
            {{'Awaiting document upload'}}
            @elseif(Session::get('user')[0]['active']=="AR")
            {{'Awaiting Rectifications'}}
            @elseif(Session::get('user')[0]['active']=="A")
            {{"Approved"}}
            @elseif(Session::get('user')[0]['active']=="R")
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
                  <img class="profile-user-img img-fluid img-circle"
                       src="@if(isset($datas->user_logo)){{asset('public/user-image').'/'.$datas->user_logo}}@else{{asset('public/img/user.png')}}@endif"
                       alt="User profile picture">
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
                    <a class="float-right">{{isset($datas->phone)?$datas->phone:''}}</a>
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
                  <li class="nav-item"><a class="nav-link" href="#stage_2" data-toggle="tab">Nationality</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_3" data-toggle="tab">Address</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_4" data-toggle="tab">Marital Status</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_5" data-toggle="tab">Father's Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_6" data-toggle="tab">Mother's  Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_7" data-toggle="tab">Other Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#stage_8" data-toggle="tab">Documents</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings1" data-toggle="tab">Profile Image</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" method="POST" action="{{route('user.edirstage1')}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Surname (As in Passport): *</label>
                        <div class="col-sm-10">
                          <input type="text" name="surname" id="surname" value="{{isset($datas->surname)? $datas->surname:''}}" required class="form-control" placeholder="Surname (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Given Name (As in Passport): *</label>
                        <div class="col-sm-10">
                          <input type="text" name="givenname" class="form-control" id="givenname" value="{{isset($datas->givenname)? $datas->givenname:''}}" placeholder="Given Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Gender : *</label>
                        <div class="col-sm-10">
                          <select name="gender" id="gender" required class="form-control" >
                              <option value="M" <?php if(isset($datas->gender) && $datas->gender=="M"){echo "selected";}?>>Male</option>
                              <option value="F" <?php if(isset($datas->gender) && $datas->gender=="F"){echo "selected";}?>>Female</option>
                              <option value="O" <?php if(isset($datas->gender) && $datas->gender=="O"){echo "selected";}?>>Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Date of Birth : *</label>
                        <div class="col-sm-10">
                          <input type="text" required name="date_of_birth" id="date_of_birth" class="form-control" value="{{isset($datas->date_of_birth)? date('d/m/Y', strtotime($datas->date_of_birth)):''}}"  placeholder="DD/MM/YYYY" readonly data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Afghan ID</label>
                        <div class="col-sm-10">
                          <input type="text" name="afghan_id" id="afghan_id" class="form-control" value="{{isset($datas->afghan_id)? $datas->afghan_id:''}}"  placeholder="Afghan ID" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
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
                    <form class="form-horizontal" method="POST" action="{{route('user.edirstage2')}}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Birth Place: *</label>
                        <div class="col-sm-10">
                          <input type="text" value="{{isset($datas->birth_place)? $datas->birth_place:''}}" name="birth_place" required class="form-control" id="birth_place" placeholder="Birth Place" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Birth Country: *</label>
                        <div class="col-sm-10">
                          <select name="birth_country" id="birth_country" required class="form-control">
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->birth_country) && $datas->birth_country==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>                 
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Current Nationality: *</label>
                        <div class="col-sm-10">
                        <select name="nationality" id="nationality" required class="form-control" >
                                        <option value=""> --Select Current Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->nationality) && $datas->nationality==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Previous/Past Nationality : </label>
                        <div class="col-sm-10">
                        <select name="previous_nationality" id="previous_nationality" class="form-control" >
                                        <option value=""> --Select Previous/Past Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->previous_nationality) && $datas->previous_nationality==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
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
                    <form class="form-horizontal" method="POST" action="{{route('user.edirstage3')}}">
                      @csrf
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Adress Line 1: *</label>
                        <div class="col-sm-10">
                         <input type="text" value="{{isset($datas->add_1)? $datas->add_1:''}}" name="add_1" required class="form-control" id="add_1" placeholder="Adress Line 1" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
             
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Adress Line 2:</label>
                        <div class="col-sm-10">
                        <input type="text" value="{{isset($datas->add_2)? $datas->add_2:''}}" name="add_2" class="form-control" id="add_2" placeholder="Adress Line 2" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                      </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">City: *</label>
                        <div class="col-sm-10">
                         <input type="text" value="{{isset($datas->city)? $datas->city:''}}" name="city" required class="form-control" id="city" placeholder="City" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Postal/zip code: *</label>
                        <div class="col-sm-10">
                         <input type="text" value="{{isset($datas->postcode)? $datas->postcode:''}}" name="postcode" required class="form-control" id="postcode" placeholder="Postal/zip code" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Phone No: </label>
                        <div class="col-sm-10">
                          <input type="number" value="{{isset($datas->phone)? $datas->phone:''}}" name="phone" class="form-control" id="phone" placeholder="Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

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
                    <form class="form-horizontal" method="POST" action="{{route('user.edirstage4')}}">
                      @csrf
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Marital Status: *</label>
                        <div class="col-sm-10">
                        <select name="marital_status" id="marital_status" Required class="form-control">
                                        <option value=""> --Select marital status-- </option>
                                        <option value="Unmarried" <?php if(isset($datas->marital_status) && $datas->marital_status=="Unmarried"){echo "selected";}?>>Unmarried</option>
                                        <option value="Married" <?php if(isset($datas->marital_status) && $datas->marital_status=="Married"){echo "selected";}?>>Married</option>
                                        <option value="Widowed" <?php if(isset($datas->marital_status) && $datas->marital_status=="Widowed"){echo "selected";}?>>Widowed</option>
                                        <option value="Divorced" <?php if(isset($datas->marital_status) && $datas->marital_status=="Divorced"){echo "selected";}?>>Divorced</option>
                                    </select>             
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Religion: *</label>
                        <div class="col-sm-10">
                        <select name="religion" id="religion" Required class="form-control">
                                        <option value=""> --Select Religion-- </option>
                                        <option value="Sikh" <?php if(isset($datas->religion) && $datas->religion=="Sikh"){echo "selected";}?>>Sikh</option>
                                        <option value="Hindu" <?php if(isset($datas->religion) && $datas->religion=="Hindu"){echo "selected";}?>>Hindu</option>
                                        <option value="Muslim" <?php if(isset($datas->religion) && $datas->religion=="Muslim"){echo "selected";}?>>Muslim</option>
                                        <option value="Christian" <?php if(isset($datas->religion) && $datas->religion=="Christian"){echo "selected";}?>>Christian</option>
                                        <option value="Others" <?php if(isset($datas->religion) && $datas->religion=="Others"){echo "selected";}?>>Others</option>
                                    </select>                     
                                   </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Profession/Occupation: </label>
                        <div class="col-sm-10">
                        <select name="profession" id="profession" class="form-control">
                                        <option value=""> --Profession/Occupation-- </option>
                                        <option value="Occupation" <?php if(isset($datas->profession) && $datas->profession=="Occupation"){echo "selected";}?>>Occupation 1</option>
                                        <option value="Occupation">Occupation 2</option>
                                        <option value="Occupation">Occupation 3</option>
                                        <option value="Occupation">Occupation 4</option>
                                    </select>
                        </div>
                      </div>
                      
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="stage3" name="stage3" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- stage 5 -->
                  <div class="tab-pane" id="stage_5">
                    <form class="form-horizontal" method="POST" action="{{route('user.edirstage5')}}">
                      @csrf
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Father's Name: *</label>
                        <div class="col-sm-10">
                        <input type="text" required name="father_name" id="father_name" value="{{isset($datas->father_name)?$datas->father_name:''}}" class="form-control" placeholder="Father's Name :" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Father's Nationality: *</label>
                        <div class="col-sm-10">
                        <select name="father_nationality" id="father_nationality" required class="form-control" >
                                        <option value=""> --Select Father's Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->father_nationality) && $datas->father_nationality==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Father's Previous/Past Nationality:</label>
                        <div class="col-sm-10">
                        <select name="father_prev_nationality" id="father_prev_nationality" class="form-control" >
                                        <option value=""> --Select Father's Previous/Past Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->father_prev_nationality) && $datas->father_prev_nationality==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>                      </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Father's Place/Country of Birth: *</label>
                        <div class="col-sm-10">
                        <select name="father_birth_country" id="father_birth_country" required class="form-control" >
                                        <option value=""> --Father's Place/Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->father_birth_country) && $datas->father_birth_country==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                        </div>
                      </div>
                      
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="stage3" name="stage3" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- stage 6 -->
                  <div class="tab-pane" id="stage_6">
                    <form class="form-horizontal" method="POST" action="{{route('user.edirstage6')}}">
                      @csrf
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Mother's Name: *</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{isset($datas->mother_name)?$datas->mother_name:''}}" required name="mother_name" id="mother_name" placeholder="Mother's Name :" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Mother's Nationality: *</label>
                        <div class="col-sm-10">
                        <select class="form-control"  name="mother_nationality" id="mother_nationality" required>
                                        <option value=""> --Select Mother's Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->mother_nationality) && $datas->mother_nationality==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Mother's Previous/Past Nationality:</label>
                        <div class="col-sm-10">
                        <select class="form-control"  name="mother_prev_nationality" id="mother_prev_nationality">
                                        <option value=""> --Select Mother's Previous/Past Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->mother_prev_nationality) && $datas->mother_prev_nationality==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>                      </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Mother's Place/Country of Birth: *</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="mother_birth_country" id="mother_birth_country" required>
                                        <option value=""> --Mother's Place/Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($datas->mother_birth_country) && $datas->mother_birth_country==$countries->id){echo "Selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                        </div>
                      </div>
                      
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="stage6" name="stage6" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- stage 7 -->
                  <div class="tab-pane" id="stage_7">
                    <form class="form-horizontal" method="POST" action="{{route('user.edirstage7')}}">
                      @csrf
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Other Information : *</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="other_info" id="other_info"  rows="5" placeholder="Other Information">{{$datas->other_info}}</textarea>
                        
                        </div>
                      </div>
                      
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="stage7" name="stage7" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- stage 8 -->
                  <div class="tab-pane" id="stage_8">
                    <form class="form-horizontal" method="POST" action="{{route('user.edirstage8')}}" enctype="multipart/form-data">
                      @csrf
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Upload Document 1 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label>
                        <div class="col-sm-10">
                          @if(isset($datas->doc_1))
                          <img src="{{asset('public/user-doc/').'/'.$datas->doc_1}}" width="100" height="100" />
                          @endif
                          <input class="form-control" type="file" {{isset($datas->doc_1)?'':'required'}} name="doc_1" id="doc_1" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Upload Document 2 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label>
                        <div class="col-sm-10">
                          @if(isset($datas->doc_2))
                          <img src="{{asset('public/user-doc/').'/'.$datas->doc_2}}" width="100" height="100" />
                          @endif
                          <input class="form-control" type="file" {{isset($datas->doc_2)?'':'required'}} name="doc_2" id="doc_2" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Upload Document 3 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label>
                        <div class="col-sm-10">
                          @if(isset($datas->doc_3))
                          <img src="{{asset('public/user-doc/').'/'.$datas->doc_3}}" width="100" height="100" />
                          @endif
                          <input class="form-control" type="file"  name="doc_3" id="doc_3" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Upload Document 4 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label>
                        <div class="col-sm-10">
                          @if(isset($datas->doc_4))
                          <img src="{{asset('public/user-doc/').'/'.$datas->doc_4}}" width="100" height="100" />
                          @endif
                          <input class="form-control" type="file" name="doc_4" id="doc_4" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                        </div>
                      </div>
                     
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" id="stage8" name="stage8" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="post" action="{{route('user.changepassword')}}">
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

@section('script')

<script>
  $(document).ready(function(){

    $("#date_of_birth").daterangepicker({
        autoUpdateInput: false,
        minYear: 1901,
        maxDate: new Date(),
        autoApply:true,
        showDropdowns: true,
        singleDatePicker: true,
        timePicker: false,
        timePicker24Hour: false,
        timePickerIncrement: 05,
        drops: "up",
        locale: {
            format: 'DD/MM/YYYY'
        }
    }).on("apply.daterangepicker", function (e, picker) {
        picker.element.val(picker.startDate.format(picker.locale.format));
    });
  });
</script>

<script>
    $(document).ready(function(){

        // doc_2
        $("#doc_1").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#doc_1").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }
        });
        $("#doc_2").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#doc_2").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }
        });

        $("#doc_3").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#doc_3").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }
        });

        $("#doc_4").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#doc_4").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }
        });
        
        $("#user_logo").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#user_logo").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }
        });

        // $("#step1").click(function(){
        //     var email_mobile=$("#email_mobile").val();
        //     var password=$("#password").val();
        //     var con_password=$("#con_password").val();
        //     var regex = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|(^[0-9]{})+$');
        //     // var regex = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|(^[0-9]{10})+$');

        //     if(!regex.test(email_mobile)){
        //         alert("Please enter valid email address or phone number.");
        //         return false;
        //     }else if (password!=con_password) {
        //         alert('Password and confirm password did not match!');
        //         return false;
        //     }
        // });
        

        // $("#submit").click(function(){
        //     // alert("hii");
        //     // return false;
        //     var surname=$('#surname').val();
        //     var givenname=$('#givenname').val();
        //     var gender=$('#gender').val();
        //     var date_of_birth=$('#date').val();
        //     var birth_place=$('#birth_place').val();
        //     var birth_country=$('#birth_country').val();
        //     var nationality=$('#nationality').val();
        //     var previous_nationality=$('#previous_nationality').val();
        //     var marital_status=$('#marital_status').val();
        //     var religion=$('#religion').val();
        //     var present_address=$('#present_address').val();
        //     var profession=$('#profession').val();
        //     var mother_name=$('#mother_name').val();
        //     var mother_nationality=$('#mother_nationality').val();
        //     var mother_prev_nationality=$('#mother_prev_nationality').val();
        //     var mother_birth_country=$('#mother_birth_country').val();
        //     var mobile=$('#mobile').val();
        //     var email=$('#email').val();
        //     var other_info=$('#other_info').val();
        // //     {surname:surname,givenname:givenname,gender:gender,date_of_birth:date_of_birth,birth_country:birth_country,nationality:nationality
        // //     ,previous_nationality:previous_nationality,marital_status:marital_status,religion:religion,present_address:present_address,
        // //     profession:profession,mother_name:mother_name,mother_nationality:mother_nationality,mother_prev_nationality:mother_prev_nationality
        // // ,mother_birth_country:mother_birth_country,mobile:mobile,email:email,other_info:other_info}
            
        //     // Family member details
        //     var first_name1=$('#first_name1').val();
        //     var middle_name1=$('#middle_name1').val();
        //     var last_name1=$('#last_name1').val();
        //     var gender1=$('#gender1').val();
        //     var relation1=$('#relation1').val();
        //     var current_citizenship1=$('#current_citizenship1').val();
        //     var previous_citizenship1=$('#previous_citizenship1').val();
        //     var passport_no1=$('#passport_no1').val();
        //     var passport_date_of_issue1=$('#passport_date_of_issue1').val();
        //     var passport_date_of_expiry1=$('#passport_date_of_expiry1').val();
        //     var other_doc_1_1=$('#other_doc_1_1').val();
        //     var other_doc_2_1=$('#other_doc_2_1').val();
        //     // {first_name1:first_name1,middle_name1:middle_name1,last_name1:last_name1,gender1:gender1,
        //     // relation1:relation1,current_citizenship1:current_citizenship1,previous_citizenship1:previous_citizenship1,
        //     // passport_no1:passport_no1,passport_date_of_issue1:passport_date_of_issue1,passport_date_of_expiry1:passport_date_of_expiry1
        //     // ,other_doc_1_1:other_doc_1_1,other_doc_2_1:other_doc_2_1}
            
        //     // alert(relation1);
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('user.registerconfirm') }}",
        //         data:{surname:surname,givenname:givenname,gender:gender,date_of_birth:date_of_birth,birth_place:birth_place,birth_country:birth_country,nationality:nationality
        //     ,previous_nationality:previous_nationality,marital_status:marital_status,religion:religion,present_address:present_address,
        //     profession:profession,mother_name:mother_name,mother_nationality:mother_nationality,mother_prev_nationality:mother_prev_nationality
        //     ,mother_birth_country:mother_birth_country,mobile:mobile,email:email,other_info:other_info,
        //     first_name1:first_name1,middle_name1:middle_name1,last_name1:last_name1,gender1:gender1,
        //     relation1:relation1,current_citizenship1:current_citizenship1,previous_citizenship1:previous_citizenship1,
        //     passport_no1:passport_no1,passport_date_of_issue1:passport_date_of_issue1,passport_date_of_expiry1:passport_date_of_expiry1
        //     ,other_doc_1_1:other_doc_1_1,other_doc_2_1:other_doc_2_1},
        //         success: function(data){
        //             alert(data);
        //             // var obj = JSON.parse ( data );
        //             // var msg=obj.msg;
        //             // $("#accept").hide();
        //             // $("#deny").hide();
                    
        //         }
        //     });

        // });

        // $('#date').datetimepicker();
        // $('#date').datetimepicker({  
        //  minDate:new Date()
        // });
        $('#dob').datepicker({ 
            autoclose: true,
            endDate: new Date(),
            dateFormat: 'dd/mm/yyyy'
            // startDate: new Date()
        });

        // addMember section
        $('#personDiv1').hide();
        $('#personDiv2').hide();
        $('#personDiv3').hide();
        $('#personDiv4').hide();
        $('#personDiv5').hide();
        $('#personDiv6').hide();
        $('#personDiv7').hide();
        $('#personDiv8').hide();
        $('#personDiv9').hide();
        $('#personDiv10').hide();
        $('#addMember').click(function(){
            // alert("hii");
            var personDiv1=$("#personDiv1").attr("data-person-value");
            var personDiv2=$("#personDiv2").attr("data-person-value");
            var personDiv3=$("#personDiv3").attr("data-person-value");
            var personDiv4=$("#personDiv4").attr("data-person-value");
            var personDiv5=$("#personDiv5").attr("data-person-value");
            var personDiv6=$("#personDiv6").attr("data-person-value");
            var personDiv7=$("#personDiv7").attr("data-person-value");
            var personDiv8=$("#personDiv8").attr("data-person-value");
            var personDiv9=$("#personDiv9").attr("data-person-value");
            var personDiv10=$("#personDiv10").attr("data-person-value");

            $("#personDiv1").attr("data-person-value", "1");
            $('#personDiv1').show();

            if(personDiv1==1){
                $("#personDiv2").attr("data-person-value", "1");
                $('#personDiv2').show();
                $('#cancelLabel1').hide();
            }
            if(personDiv2==1){
                $("#personDiv3").attr("data-person-value", "1");
                $('#personDiv3').show();
                $('#cancelLabel2').hide();
            }
            if(personDiv3==1){
                $("#personDiv4").attr("data-person-value", "1");
                $('#personDiv4').show();
                $('#cancelLabel3').hide();
            }
            if(personDiv4==1){
                $("#personDiv5").attr("data-person-value", "1");
                $('#personDiv5').show();
                $('#cancelLabel4').hide();
            }
            if(personDiv5==1){
                $("#personDiv6").attr("data-person-value", "1");
                $('#personDiv6').show();
                $('#cancelLabel5').hide();
            }
            if(personDiv6==1){
                $("#personDiv7").attr("data-person-value", "1");
                $('#personDiv7').show();
                $('#cancelLabel6').hide();
            }
            if(personDiv7==1){
                $("#personDiv8").attr("data-person-value", "1");
                $('#personDiv8').show();
                $('#cancelLabel7').hide();
            }
            if(personDiv8==1){
                $("#personDiv9").attr("data-person-value", "1");
                $('#personDiv9').show();
                $('#cancelLabel8').hide();
            }
            if(personDiv9==1){
                $("#personDiv10").attr("data-person-value", "1");
                $('#personDiv10').show();
                $('#addMember').hide();
                $('#cancelLabel9').hide();
            }

        });


        $('#cancelMember1').click(function(){
            $("#personDiv1").attr("data-person-value", "0");
            $("#personDiv1").hide();
        });

        $('#cancelMember2').click(function(){
            $("#personDiv2").attr("data-person-value", "0");
            $("#personDiv2").hide();
            $('#cancelLabel1').show();
        });

        $('#cancelMember3').click(function(){
            $("#personDiv3").attr("data-person-value", "0");
            $("#personDiv3").hide();
            $('#cancelLabel2').show();
        });

        $('#cancelMember4').click(function(){
            $("#personDiv4").attr("data-person-value", "0");
            $("#personDiv4").hide();
            $('#cancelLabel3').show();
        });
        $('#cancelMember5').click(function(){
            $("#personDiv5").attr("data-person-value", "0");
            $("#personDiv5").hide();
            $('#cancelLabel4').show();
        });
        $('#cancelMember6').click(function(){
            $("#personDiv6").attr("data-person-value", "0");
            $("#personDiv6").hide();
            $('#cancelLabel5').show();
        });
        $('#cancelMember7').click(function(){
            $("#personDiv7").attr("data-person-value", "0");
            $("#personDiv7").hide();
            $('#cancelLabel6').show();
        });
        $('#cancelMember8').click(function(){
            $("#personDiv8").attr("data-person-value", "0");
            $("#personDiv8").hide();
            $('#cancelLabel7').show();
        });
        $('#cancelMember9').click(function(){
            $("#personDiv9").attr("data-person-value", "0");
            $("#personDiv9").hide();
            $('#cancelLabel8').show();
        });
        $('#cancelMember10').click(function(){
            $("#personDiv10").attr("data-person-value", "0");
            $("#personDiv10").hide();
            $('#cancelLabel9').show();
            $('#addMember').show();

        });



    });
    function varRegister(){
        // statusMsg
        // satusImg
        // msgMsg
        $('#statusMsg').empty();
        $('#satusImg').removeAttr('src');
        $('#msgMsg').empty();
        var surname=$('#surname').val();
            var givenname=$('#givenname').val();
            var gender=$('#gender').val();
            var date_of_birth=$('#date').val();
            var birth_place=$('#birth_place').val();
            var birth_country=$('#birth_country').val();
            var nationality=$('#nationality').val();
            var previous_nationality=$('#previous_nationality').val();
            var marital_status=$('#marital_status').val();
            var religion=$('#religion').val();
            var present_address=$('#present_address').val();
            var profession=$('#profession').val();
            var mother_name=$('#mother_name').val();
            var mother_nationality=$('#mother_nationality').val();
            var mother_prev_nationality=$('#mother_prev_nationality').val();
            var mother_birth_country=$('#mother_birth_country').val();
            var mobile=$('#mobile').val();
            var email=$('#email').val();
            var other_info=$('#other_info').val();
        //     {surname:surname,givenname:givenname,gender:gender,date_of_birth:date_of_birth,birth_country:birth_country,nationality:nationality
        //     ,previous_nationality:previous_nationality,marital_status:marital_status,religion:religion,present_address:present_address,
        //     profession:profession,mother_name:mother_name,mother_nationality:mother_nationality,mother_prev_nationality:mother_prev_nationality
        // ,mother_birth_country:mother_birth_country,mobile:mobile,email:email,other_info:other_info}
            
            // Family member details
            var email1=$('#email1').val();
            var first_name1=$('#first_name1').val();
            var middle_name1=$('#middle_name1').val();
            var last_name1=$('#last_name1').val();
            var gender1=$('#gender1').val();
            var relation1=$('#relation1').val();
            var current_citizenship1=$('#current_citizenship1').val();
            var previous_citizenship1=$('#previous_citizenship1').val();
            var passport_no1=$('#passport_no1').val();
            var passport_date_of_issue1=$('#passport_date_of_issue1').val();
            var passport_date_of_expiry1=$('#passport_date_of_expiry1').val();
            var other_doc_1_1=$('#other_doc_1_1').val();
            var other_doc_2_1=$('#other_doc_2_1').val();
            // {first_name1:first_name1,middle_name1:middle_name1,last_name1:last_name1,gender1:gender1,
            // relation1:relation1,current_citizenship1:current_citizenship1,previous_citizenship1:previous_citizenship1,
            // passport_no1:passport_no1,passport_date_of_issue1:passport_date_of_issue1,passport_date_of_expiry1:passport_date_of_expiry1
            // ,other_doc_1_1:other_doc_1_1,other_doc_2_1:other_doc_2_1}
            
            // alert(email1);
            $.ajax({
                type: "POST",
                url: "{{ route('user.registerconfirm') }}",
                data:{surname:surname,givenname:givenname,gender:gender,date_of_birth:date_of_birth,birth_place:birth_place,birth_country:birth_country,nationality:nationality
            ,previous_nationality:previous_nationality,marital_status:marital_status,religion:religion,present_address:present_address,
            profession:profession,mother_name:mother_name,mother_nationality:mother_nationality,mother_prev_nationality:mother_prev_nationality
            ,mother_birth_country:mother_birth_country,mobile:mobile,email:email,other_info:other_info,
            email1:email1,first_name1:first_name1,middle_name1:middle_name1,last_name1:last_name1,gender1:gender1,
            relation1:relation1,current_citizenship1:current_citizenship1,previous_citizenship1:previous_citizenship1,
            passport_no1:passport_no1,passport_date_of_issue1:passport_date_of_issue1,passport_date_of_expiry1:passport_date_of_expiry1
            ,other_doc_1_1:other_doc_1_1,other_doc_2_1:other_doc_2_1},
                success: function(data){
                    alert(data);
                    var obj = JSON.parse ( data );
                    var msg=obj.msg;
                    var imgurl='https://i.imgur.com/GwStPmg.png';
                    if(msg=="success"){
                        $('#statusMsg').append('SUCCESS !');
                        $('#satusImg').attr('src',imgurl);
                        $('#msgMsg').append('Form Submited Successfully Pending for approval'); 
                    }else if(msg=="already"){
                        $('#statusMsg').append('FAILED !');
                        // $('#satusImg').attr('src',imgurl);
                        $('#msgMsg').append('Already Submited This Email Id or Phone No'); 
                    }
                    // $('#statusMsg').empty();
                    // $('#satusImg').removeAttr();
                    // $('#msgMsg').empty();
                    
                }
            });
    }
</script>

@endsection
