@extends('admin.common.master')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Upload Letter Head & Logo</h1>
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
              <form name="myform" method="POST" action="{{route('gurudwara.uploadConfirm')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="id" name="id" value="{{Session::get('gurudwara')[0]['id']}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Upload Gurdwara Logo</label>
                                <input type="file" required class="form-control" style="" name="logo" id="logo" accept="image/png, image/gif, image/jpeg" />
                                <!-- <input type="text" name="surname" value="" class="form-control" > -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Upload Letter Head</label>
                                <input type="file" required name="letter_head" class="form-control" id="letter_head" accept="image/png, image/gif, image/jpeg" />
                                <!-- <input type="text"  name="givenname" value="" class="form-control" > -->
                            </div>
                        </div>
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