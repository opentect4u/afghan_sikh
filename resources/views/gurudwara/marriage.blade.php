@extends('admin.common.master')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{isset($user_data)?'Edit':'Add'}}</h1>
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
              <form name="myform" method="POST" action="{{isset($user_data)?route('gurudwara.marriageeditConfirm'):route('gurudwara.marriageConfirm')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($user_data)? $user_data->id:''}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Marriage Ceremony of Shri</label>
                                <!-- <input type="file" required class="form-control" style="" name="logo" id="logo" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="text" required name="shri_name" value="{{isset($user_data)?$user_data->ceremony_of_shri:''}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Son of Shri</label>
                                <!-- <input type="file" required name="letter_head" class="form-control" id="letter_head" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="text" required name="son_shri_name" value="{{isset($user_data)?$user_data->son_of_shri:''}}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>With Shrimati</label>
                                <!-- <input type="file" required class="form-control" style="" name="logo" id="logo" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="text" required name="shrimati_name" value="{{isset($user_data)?$user_data->with_shrimati:''}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Daughter of Shri</label>
                                <!-- <input type="file" required name="letter_head" class="form-control" id="letter_head" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="text" required name="daughter_shrimati_name" value="{{isset($user_data)?$user_data->daughter_of_shri:''}}" class="form-control" >
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Marriage</label>
                                <!-- <input type="file" required name="letter_head" class="form-control" id="letter_head" accept="image/png, image/gif, image/jpeg" /> -->
                                <input type="date" required name="date_of_marriage" value="{{isset($user_data)?$user_data->date_of_marriage:''}}" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Thumb Impression of Shri</label>
                                <input type="file" {{isset($user_data)?'':'required'}} class="form-control" style="" name="shri_photo" id="shri_photo" accept="image/png, image/gif, image/jpeg" />
                                <!-- <input type="text" name="surname" value="" class="form-control" > -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Thumb Impression of Shrimati</label>
                                <input type="file" {{isset($user_data)?'':'required'}} name="shrimati_photo" class="form-control" id="shrimati_photo" accept="image/png, image/gif, image/jpeg" />
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