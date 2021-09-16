@extends('admin.common.master')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Apply Now for {{$service_type}}</h1>
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
              <form name="myform" method="POST" action="{{ route('user.registerservicesConfirm')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="service_type" name="service_type" value="{{$service_type}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <!-- <label class="fieldlabels">First Name (As in Passport) : *</label>  -->
                                <!-- <input type="text" required name="first_name" value="{{isset($editdata)? $editdata->first_name:''}}" class="form-control" > -->
                                <input type="radio" id="html" class="RadioMember" name="fav_language" value="Self" checked>
                                <label for="html">Self</label>&nbsp;&nbsp;
                                <input type="radio" id="css" class="RadioMember" name="fav_language" value="Family">
                                <label for="css">Family</label>
                                <select name="family_details" id="family_details" class="form-control">
                                  <option value="">--select--</option>
                                  @foreach($family_details as $details)
                                  <option value="{{$details->id}}">{{$details->first_name.' '.$details->middle_name.' '.$details->last_name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="fieldlabels">Middle Name (As in Passport) : *</label> 
                                <input type="text" name="middle_name" value="{{isset($editdata)? $editdata->middle_name:''}}" class="form-control" >
                            </div>
                        </div> -->
                       
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels">User Information : *</label> 
                                <!-- <input type="text" required name="user_info" value="" class="form-control" > -->
                                <textarea required name="user_info" value="" class="form-control"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="fieldlabels">Upload Document 1: *</label> 
                          <input type="file" required name="doc_1" class="form-control"/> 
                        </div>
                      </div> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="fieldlabels">Upload Document 2: *</label> 
                          <input type="file" required name="doc_2" class="form-control"/> 
                        </div>
                      </div> 
                       
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="fieldlabels">Upload Document 3: *</label> 
                          <input type="file" required name="doc_3" class="form-control" /> 
                        </div>
                      </div> 
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label class="fieldlabels">Upload Document 4: *</label> 
                          <input type="file" required name="doc_4" class="form-control" /> 
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


@section('script')
<script>
  $(document).ready(function(){
    $('#family_details').hide();
    // $('input[name="fav_language"]:checked').val();

    $('.RadioMember').on('change', function() {
      // alert($('input[name="fav_language"]:checked').val()); 
      var data=$('input[name="fav_language"]:checked').val();
      if(data=='Family'){
        $('#family_details').show();
        $('#family_details').attr('required','required');
        // $('#family_details').val('');
      }else{
        $('#family_details').hide();
        $('#family_details').removeAttr('required');
        $('#family_details').val('');

      }
    });

  });
</script>
@endsection
