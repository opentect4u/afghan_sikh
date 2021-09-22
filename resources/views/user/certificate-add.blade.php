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
              <form name="myform" method="POST" action="{{ isset($editdata)? route('user.editcertificateConfirm'):route('user.addcertificateConfirm')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($editdata)? $editdata->id:''}}"/>
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
                       
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Certificate Type : * </label>
                                <select name="certificates_type_id" id="certificates_type_id" required class="form-control">
                                  <option value="">--Select Certificate Type--</option>
                                  @foreach($certificate as $certificates)
                                  <option value="{{$certificates->id}}" <?php if(isset($editdata) && $editdata->certificates_type_id==$certificates->id){echo "selected";}?>>{{$certificates->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Remark : * </label>
                                <input type="text" name="remark" id="remark" class="form-control" />
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ceremony of Shri : * </label>
                                <input type="text" required name="ceremony_of_shri" id="ceremony_of_shri" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Son of Shri : * </label>
                                <input type="text" required name="son_of_shri" id="son_of_shri" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ceremony of Shrimati : * </label>
                                <input type="text" required name="with_shrimati" id="with_shrimati" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Daughter of Shrimati : * </label>
                                <input type="text" required name="daughter_of_shri" id="daughter_of_shri" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Marriage : * </label>
                                <input type="text" required name="date_of_marriage" id="date_of_marriage" placeholder="DD-MM-YYYY" class="form-control" />
                            </div>
                        </div>
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Daughter of Shrimati : * </label>
                                <input type="text" required name="daughter_of_shri" id="daughter_of_shri" class="form-control" />
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Remark : * </label>
                                <textarea name="remark" id="remark" class="form-control"></textarea>
                                <!-- <input type="text" name="remark" id="remark" class="form-control" /> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels">Upload Document 1 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_1!='')
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_1}}" width="100" height="100"/>
                                @endif
                                <input type="file" {{isset($editdata)? '':'required'}} name="doc_1" id="doc_1" value="{{isset($editdata)? $editdata->last_name:''}}" class="form-control" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="fieldlabels">Upload Document 2 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_2!='')
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_2}}" width="100" height="100"/>
                                @endif
                                <input type="file" {{ isset($editdata)? '':'required' }} name="doc_2" id="doc_2" value="{{isset($editdata)? $editdata->last_name:''}}" class="form-control" >
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                            <div class="form-group">
                                <label class="fieldlabels">Upload Document 3 : (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_3!='')
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_3}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_3" id="doc_3" value="{{isset($editdata)? $editdata->last_name:''}}" class="form-control" >
                                
                            </div>
                      </div> 
                      <div class="col-sm-6">
                            <div class="form-group">
                                <label class="fieldlabels">Upload Document 4 : (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_4!='')
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_4}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_4" id="doc_4" value="{{isset($editdata)? $editdata->last_name:''}}" class="form-control" >
                                
                            </div>
                      </div> 
                       
                    </div>
                   
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Save </button>
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
    });
</script>


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

    
    $("#date_of_marriage").daterangepicker({
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
            format: 'DD-MM-YYYY'
        }
    }).on("apply.daterangepicker", function (e, picker) {
        picker.element.val(picker.startDate.format(picker.locale.format));
    });

  });
</script>
@endsection