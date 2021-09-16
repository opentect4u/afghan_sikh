@extends('admin.common.master')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{isset($editdata)?'Edit':'Add'}}</h1>
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
              <form name="myform" method="POST" action="{{route('user.addfamilymemberconfirm2')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($editdata)? $editdata->id:''}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship" id="current_citizenship" class="form-control" required>
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}" <?php if( isset($editdata) && $editdata->current_citizenship==$countries->id){ echo "selected";}?>>{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship" id="previous_citizenship" required class="form-control">
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
                              <input type="text" name="passport_no" id="passport_no" value="{{isset($editdata->passport_no)? $editdata->passport_no:''}}" placeholder="Passport Number:"  class="form-control" />
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
                                        <input type="date" class="form-control" name="passport_date_of_issue" id="passport_date_of_issue" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            </div>
                        </div> 
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label class="fieldlabels">Passport Date of Expiry : </label> 
                            <input type="date" class="form-control" name="passport_date_of_expiry" id="passport_date_of_expiry" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            </div>
                        </div> 
                       
                    </div>
                   
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Save & Continue</button>
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