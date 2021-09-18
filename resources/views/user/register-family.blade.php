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
              <form name="myform" method="POST" action="{{ isset($editdata)? route('user.editfamilymemberconfirm'):route('user.addfamilymemberconfirm')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($editdata)? $editdata->id:''}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                <input type="text" required name="first_name" value="{{isset($editdata)? $editdata->first_name:''}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                <input type="text" name="middle_name" value="{{isset($editdata)? $editdata->middle_name:''}}" class="form-control" >
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
                                <input type="text" required name="last_name" value="{{isset($editdata)? $editdata->last_name:''}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender </label>
                                <select name="gender" id="gender" class="form-control">
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
                                <select name="relation" id="relation" class="form-control">
                                    <option value="Father" <?php if( isset($editdata) && $editdata->relation=='Father'){ echo "selected";}?>>Father</option>
                                    <option value="Mother" <?php if( isset($editdata) && $editdata->relation=='Mother'){ echo "selected";}?>>Mother</option>
                                    <option value="Son" <?php if( isset($editdata) && $editdata->relation=='Son'){ echo "selected";}?>>Son</option>
                                    <option value="Daughter" <?php if( isset($editdata) && $editdata->relation=='Daughter'){ echo "selected";}?>>Daughter</option>
                                    <option value="Spouse" <?php if( isset($editdata) && $editdata->relation=='Spouse'){ echo "selected";}?>>Spouse</option>
                                </select>
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