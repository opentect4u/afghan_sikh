@extends('admin.common.master')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View</h1>
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
              <form name="myform" method="POST" action="{{ isset($editdata)? route('user.editfamilymemberconfirm'):route('user.addfamilymemberconfirm')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($editdata)? $editdata->id:''}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                <input type="text" readonly required name="first_name" value="{{isset($editdata)? $editdata->first_name:''}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                <input type="text" readonly name="middle_name" value="{{isset($editdata)? $editdata->middle_name:''}}" class="form-control" >
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Relation </label>
                                <select name="relation" id="relation" class="form-control">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                <input type="text" readonly required name="last_name" value="{{isset($editdata)? $editdata->last_name:''}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender </label>
                                <select disabled name="gender" id="gender" class="form-control">
                                    <option value="M" <?php if( isset($editdata) && $editdata->gender=='M'){ echo "selected";}?>>Male</option>
                                    <option value="F" <?php if( isset($editdata) && $editdata->gender=='F'){ echo "selected";}?>>Female</option>
                                    <option value="O" <?php if( isset($editdata) && $editdata->gender=='O'){ echo "selected";}?>>Other</option>
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                            <label>Relation </label>
                            <select disabled name="relation" id="relation" class="form-control">
                                <option value="Spouse" <?php if( isset($editdata) && $editdata->relation=='Spouse'){ echo "selected";}?>>Spouse</option>
                                <option value="Father" <?php if( isset($editdata) && $editdata->relation=='Father'){ echo "selected";}?>>Father</option>
                                <option value="Mother" <?php if( isset($editdata) && $editdata->relation=='Mother'){ echo "selected";}?>>Mother</option>
                                <option value="Son" <?php if( isset($editdata) && $editdata->relation=='Son'){ echo "selected";}?>>Son</option>
                                <option value="Daughter" <?php if( isset($editdata) && $editdata->relation=='Daughter'){ echo "selected";}?>>Daughter</option>
                            </select>
                          </div>
                      </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label class="fieldlabels">Current Citizenship : *</label> 
                                        <select disabled name="current_citizenship" id="current_citizenship" class="form-control" required>
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}" <?php if(isset($editdata) && $editdata->current_citizenship==$countries->id){ echo "selected";}?>>{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label class="fieldlabels">Previous Citizenship : *</label> 
                                        <select disabled name="previous_citizenship" id="previous_citizenship" required class="form-control">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}" <?php if( isset($editdata) && $editdata->previous_citizenship==$countries->id){ echo "selected";}?>>{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Relation </label>
                                <select name="relation" id="relation" class="form-control">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label class="fieldlabels">Passport Number : </label> 
                              <input disabled type="text" name="passport_no" id="passport_no" value="{{isset($editdata->passport_no)? $editdata->passport_no:''}}" placeholder="Passport Number:"  class="form-control" />
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender </label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="O">Other</option>
                                   
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                            <div class="form-group">
                            <label class="fieldlabels">Passport Date of Issue : </label> 
                              <input disabled type="text" class="form-control" value="{{isset($editdata->passport_date_of_issue)? $editdata->passport_date_of_issue:''}}" name="passport_date_of_issue" id="passport_date_of_issue" placeholder="dd/mm/yyyy" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label class="fieldlabels">Passport Date of Expiry : </label> 
                            <input disabled type="text" class="form-control" value="{{isset($editdata->passport_date_of_expiry)? $editdata->passport_date_of_expiry:''}}" name="passport_date_of_expiry" id="passport_date_of_expiry" placeholder="dd/mm/yyyy" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            </div>
                        </div> 
                       
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label class="fieldlabels">Afghan Id  : </label> 
                            <input disabled type="text" name="afghan_id" id="afghan_id" value="{{isset($editdata->afghan_id)? $editdata->afghan_id:''}}" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label class="fieldlabels">Email : </label> 
                            <input disabled type="email" name="email" id="email" value="{{isset($editdata->email)? $editdata->email:''}}" class="form-control"/>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Relation </label>
                                <select name="relation" id="relation" class="form-control">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label class="fieldlabels">Phone Number : *</label> 
                            <input disabled type="number" name="phone" id="phone" value="{{isset($editdata->phone)? $editdata->phone:''}}" class="form-control" required />
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender </label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="O">Other</option>
                                   
                                </select>
                            </div>
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <label class="fieldlabels">Upload Document 1 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_1!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_1}}" width="100" height="100"/>
                                @endif
                                <input disabled type="file" <?php if(isset($editdata) && $editdata->doc_1!=''){echo "";}else{echo "required";}?> name="doc_1" id="doc_1" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <label class="fieldlabels">Upload Document 2 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_2!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_2}}" width="100" height="100"/>
                                @endif
                                <input disabled type="file" <?php if(isset($editdata) && $editdata->doc_2!=''){echo "";}else{echo "required";}?> name="doc_2" id="doc_2" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Relation </label>
                                <select name="relation" id="relation" class="form-control">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels">Upload Document 3 : (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc3!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_3}}" width="100" height="100"/>
                                @endif
                                <input disabled type="file" name="doc_3" id="doc_3" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="fieldlabels">Upload Document 4 : (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_4!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_4}}" width="100" height="100"/>
                                @endif
                                <input disabled type="file" name="doc_4" id="doc_4" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                                
                            </div>
                        </div>
                    </div>
                   
                   
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <!-- <button type="submit" id="submit" name="submit" class="btn btn-primary">Save & Continue</button> -->
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