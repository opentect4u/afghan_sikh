@extends('admin.common.master')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Birth</h1>
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
              <form name="myform" method="POST" action="{{route('gurudwara.addbirthConfirm')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="id" name="id" value="{{Session::get('gurudwara')[0]['id']}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Name of Baby</label>
                                <input type="text" required name="name_of_baby" value="" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Gender of Baby</label>
                                <select required name="gender_of_baby" class="form-control">
                                  <option> -- Select -- </option>
                                  <option value="M">Male</option>
                                  <option value="F">Female</option>
                                  <option value="O">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Place of Birth </label>
                                <!-- <input type="file" required class="form-control" style="" name="logo" id="logo" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="text" required name="place_of_birth" value="" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <!-- <input type="file" required name="letter_head" class="form-control" id="letter_head" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="date" required name="date_of_birth" value="" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Baby of Shri </label>
                                <!-- <input type="file" required class="form-control" style="" name="logo" id="logo" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="text" required name="baby_of_shri" value="" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Baby of Shrimati </label>
                                <!-- <input type="file" required name="letter_head" class="form-control" id="letter_head" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="text" required name="baby_of_shrimati" value="" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>At Gurdwara Sahib Settled</label>
                                <!-- <input type="file" required class="form-control" style="" name="logo" id="logo" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="text" required readonly name="gurdwara_sahib_settled" value="{{$gurdwara_name}}" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Marriage</label>
                                <input type="date" required name="date_of_marriage" value="" class="form-control" >
                            </div>
                        </div> -->
                    </div>
                    
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