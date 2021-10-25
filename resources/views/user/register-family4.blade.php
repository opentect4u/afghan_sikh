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
              <!-- afghan id /email/phone -->
              <form name="myform" method="POST" action="{{route('user.addfamilymemberconfirm4')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" id="id" name="id" value="{{isset($editdata)? $editdata->id:''}}"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                               <label class="fieldlabels"> Document 1 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_1!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_1}}" width="100" height="100"/>
                                @endif
                                <input type="file" <?php if(isset($editdata) && $editdata->doc_1!=''){echo "";}else{echo "required";}?> name="doc_1" id="doc_1" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="fieldlabels"> Document 1 Name: </label> 
                                <input type="text" required name="doc_1_name" id="doc_1_name" value="{{isset($editdata)?$editdata->doc_1_name:''}}" class="form-control" placeholder="Document 1 Name" />
                            </div>
                        </div>
                        <!-- <div class="col-sm-1">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div> -->
                    </div>
                    <div class="row" id="uploadDiv2" data-upload-div-value="0">
                        
                        <div class="col-sm-5">
                            <!-- text input -->
                            <div class="form-group">
                               <label class="fieldlabels"> Document 2 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_2!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_2}}" width="100" height="100"/>
                                @endif
                                <input type="file" <?php if(isset($editdata) && $editdata->doc_2!=''){echo "";}else{echo "required";}?> name="doc_2" id="doc_2" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels"> Document 2 Name: </label> 
                                <input type="text" name="doc_2_name" id="doc_2_name" value="{{isset($editdata)?$editdata->doc_2_name:''}}" class="form-control" placeholder="Document 2 Name" />
                            </div>
                        </div>
                        <div class="col-sm-1" id="cancelLabel2">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" id="cancelA2" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="uploadDiv3" data-upload-div-value="0">
                        <div class="col-sm-5">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels"> Document 3 : (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc3!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_3}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_3" id="doc_3" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="fieldlabels"> Document 3 Name: </label> 
                                
                                <input type="text" name="doc_3_name" id="doc_3_name" value="{{isset($editdata)?$editdata->doc_3_name:''}}" class="form-control" placeholder="Document 3 Name" />
                                
                            </div>
                        </div>
                        <div class="col-sm-1" id="cancelLabel3">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" id="cancelA3" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="uploadDiv4" data-upload-div-value="0">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="fieldlabels"> Document 4 : (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_4!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_4}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_4" id="doc_4" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels"> Document 4 Name: </label> 
                                <input type="text" name="doc_4_name" id="doc_4_name" value="{{isset($editdata)?$editdata->doc_4_name:''}}" class="form-control" placeholder="Document 4 Name" />
                            </div>
                        </div>
                        <div class="col-sm-1" id="cancelLabel4">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" id="cancelA4" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="uploadDiv5" data-upload-div-value="0">
                        
                        <div class="col-sm-5">
                            <!-- text input -->
                            <div class="form-group">
                               <label class="fieldlabels"> Document 5 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_5!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_5}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_5" id="doc_5" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels"> Document 5 Name: </label> 
                                <input type="text" name="doc_5_name" id="doc_5_name" value="{{isset($editdata)?$editdata->doc_5_name:''}}" class="form-control" placeholder="Document 5 Name" />
                            </div>
                        </div>
                        <div class="col-sm-1" id="cancelLabel2">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" id="cancelA2" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="uploadDiv6" data-upload-div-value="0">
                        
                        <div class="col-sm-5">
                            <!-- text input -->
                            <div class="form-group">
                               <label class="fieldlabels"> Document 6 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_6!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_6}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_6" id="doc_6" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels"> Document 6 Name: </label> 
                                <input type="text" name="doc_6_name" id="doc_6_name" value="{{isset($editdata)?$editdata->doc_6_name:''}}" class="form-control" placeholder="Document 6 Name" />
                            </div>
                        </div>
                        <div class="col-sm-1" id="cancelLabel6">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" id="cancelA6" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="uploadDiv7" data-upload-div-value="0">
                        <div class="col-sm-5">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels"> Document 7 : (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc7!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_3}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_7" id="doc_7" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="fieldlabels"> Document 7 Name: </label> 
                                
                                <input type="text" name="doc_7_name" id="doc_7_name" value="{{isset($editdata)?$editdata->doc_7_name:''}}" class="form-control" placeholder="Document 7 Name" />
                                
                            </div>
                        </div>
                        <div class="col-sm-1" id="cancelLabel7">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" id="cancelA7" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="uploadDiv8" data-upload-div-value="0">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="fieldlabels"> Document 8 : (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_8!='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_8}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_8" id="doc_8" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels"> Document 8 Name: </label> 
                                <input type="text" name="doc_8_name" id="doc_8_name" value="{{isset($editdata)?$editdata->doc_8_name:''}}" class="form-control" placeholder="Document 8 Name" />
                            </div>
                        </div>
                        <div class="col-sm-1" id="cancelLabel8">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" id="cancelA8" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="uploadDiv9" data-upload-div-value="0">
                        
                        <div class="col-sm-5">
                            <!-- text input -->
                            <div class="form-group">
                               <label class="fieldlabels"> Document 9 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_9='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_9}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_9" id="doc_9" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels"> Document 9 Name: </label> 
                                <input type="text" name="doc_9_name" id="doc_9_name" value="{{isset($editdata)?$editdata->doc_9_name:''}}" class="form-control" placeholder="Document 9 Name" />
                            </div>
                        </div>
                        <div class="col-sm-1" id="cancelLabel9">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" id="cancelA9" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="uploadDiv10" data-upload-div-value="0">
                        
                        <div class="col-sm-5">
                            <!-- text input -->
                            <div class="form-group">
                               <label class="fieldlabels"> Document 10 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_10='')
                                <img src="{{asset('public/user-family-doc/').'/'.$editdata->doc_10}}" width="100" height="100"/>
                                @endif
                                <input type="file" name="doc_10" id="doc_10" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <!-- text input -->
                            <div class="form-group">
                                <label class="fieldlabels"> Document 10 Name: </label> 
                                <input type="text" name="doc_10_name" id="doc_10_name" value="{{isset($editdata)?$editdata->doc_10_name:''}}" class="form-control" placeholder="Document 9 Name" />
                            </div>
                        </div>
                        <div class="col-sm-1" id="cancelLabel10">
                            <div class="form-group">
                                <label class="fieldlabels">  </label> 
                                <a href="javascript:void(0)" id="cancelA10" class="form-control" style="margin-top:7px;">Cancel</a>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-sm-6">
                            <label class="fieldlabels"><a href="javascript:void(0);" style="color:#ffa716;" onclick="UploadMore();"><i class="fa fa-plus" aria-hidden="true"></i> Upload More Document</a></label> 
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

    var uploadDiv2='<?php if(isset($editdata) && $editdata->doc_2){echo $editdata->doc_2;}?>';
    var uploadDiv3='<?php if(isset($editdata) && $editdata->doc_3){echo $editdata->doc_3;}?>';
    var uploadDiv4='<?php if(isset($editdata) && $editdata->doc_4){echo $editdata->doc_4;}?>';
    var uploadDiv5='<?php if(isset($editdata) && $editdata->doc_5){echo $editdata->doc_5;}?>';
    var uploadDiv6='<?php if(isset($editdata) && $editdata->doc_6){echo $editdata->doc_6;}?>';
    var uploadDiv7='<?php if(isset($editdata) && $editdata->doc_7){echo $editdata->doc_7;}?>';
    var uploadDiv8='<?php if(isset($editdata) && $editdata->doc_8){echo $editdata->doc_8;}?>';
    var uploadDiv9='<?php if(isset($editdata) && $editdata->doc_9){echo $editdata->doc_9;}?>';
    var uploadDiv10='<?php if(isset($editdata) && $editdata->doc_10){echo $editdata->doc_10;}?>';
    // alert(uploadDiv2);
    if(uploadDiv2==''){
        $('#uploadDiv2').hide();
    }
    if(uploadDiv3==''){
        $('#uploadDiv3').hide();
    }
    if(uploadDiv4==''){
        $('#uploadDiv4').hide();
    }
    if(uploadDiv5==''){
        $('#uploadDiv5').hide();
    }
    if(uploadDiv6==''){
        $('#uploadDiv6').hide();
    }
    if(uploadDiv7==''){
        $('#uploadDiv7').hide();
    }
    if(uploadDiv8==''){
        $('#uploadDiv8').hide();
    }
    if(uploadDiv9==''){
        $('#uploadDiv9').hide();
    }
    if(uploadDiv10==''){
        $('#uploadDiv10').hide();
    }
    function UploadMore(){
        // alert("hii");
        var valuploadDiv2= $("#uploadDiv2").attr("data-upload-div-value");
        var valuploadDiv3= $("#uploadDiv3").attr("data-upload-div-value");
        var valuploadDiv4= $("#uploadDiv4").attr("data-upload-div-value");
        var valuploadDiv5= $("#uploadDiv5").attr("data-upload-div-value");
        var valuploadDiv6= $("#uploadDiv6").attr("data-upload-div-value");
        var valuploadDiv7= $("#uploadDiv7").attr("data-upload-div-value");
        var valuploadDiv8= $("#uploadDiv8").attr("data-upload-div-value");
        var valuploadDiv9= $("#uploadDiv9").attr("data-upload-div-value");
        var valuploadDiv10= $("#uploadDiv10").attr("data-upload-div-value");

        // alert(valuploadDiv2);
        $("#uploadDiv2").attr("data-upload-div-value", "1");
        $('#uploadDiv2').show();
        $("#doc_2").attr('required','required');
        $("#doc_2_name").attr('required','required');

        if(valuploadDiv2==1){
            $("#uploadDiv3").attr("data-upload-div-value", "1");
            $('#uploadDiv3').show();
            $('#cancelLabel2').hide();
            $("#doc_3").attr('required','required');
            $("#doc_3_name").attr('required','required');
        }
        if(valuploadDiv3==1){
            $("#uploadDiv4").attr("data-upload-div-value", "1");
            $('#uploadDiv4').show();
            $('#cancelLabel3').hide();
            $("#doc_4").attr('required','required');
            $("#doc_4_name").attr('required','required');
        }
        if(valuploadDiv4==1){
            $("#uploadDiv5").attr("data-upload-div-value", "1");
            $('#uploadDiv5').show();
            $('#cancelLabel4').hide();
            $("#doc_5").attr('required','required');
            $("#doc_5_name").attr('required','required');
        }
        if(valuploadDiv5==1){
            $("#uploadDiv6").attr("data-upload-div-value", "1");
            $('#uploadDiv6').show();
            $('#cancelLabel5').hide();
            $("#doc_6").attr('required','required');
            $("#doc_6_name").attr('required','required');
        }
        if(valuploadDiv6==1){
            $("#uploadDiv7").attr("data-upload-div-value", "1");
            $('#uploadDiv7').show();
            $('#cancelLabel6').hide();
            $("#doc_7").attr('required','required');
            $("#doc_7_name").attr('required','required');
        }
        if(valuploadDiv7==1){
            $("#uploadDiv8").attr("data-upload-div-value", "1");
            $('#uploadDiv8').show();
            $('#cancelLabel7').hide();
            $("#doc_8").attr('required','required');
            $("#doc_8_name").attr('required','required');
        }
        if(valuploadDiv8==1){
            $("#uploadDiv9").attr("data-upload-div-value", "1");
            $('#uploadDiv9').show();
            $('#cancelLabel8').hide();
            $("#doc_9").attr('required','required');
            $("#doc_9_name").attr('required','required');
        }
        if(valuploadDiv9==1){
            $("#uploadDiv10").attr("data-upload-div-value", "1");
            $('#uploadDiv10').show();
            $('#cancelLabel9').hide();
            $("#doc_10").attr('required','required');
            $("#doc_10_name").attr('required','required');
        }

    }

    $('#cancelA2').click(function(){
        $("#uploadDiv2").attr("data-upload-div-value", "0");
        $('#uploadDiv2').hide(); 
        $("#doc_2").removeAttr('required');
        $("#doc_2_name").removeAttr('required');
        $("#doc_2").val('');
        $("#doc_2_name").val('');
    });
    $('#cancelA3').click(function(){
        $("#uploadDiv3").attr("data-upload-div-value", "0");
        $('#uploadDiv3').hide(); 
        $('#cancelLabel2').show();
        $("#doc_3").removeAttr('required');
        $("#doc_3_name").removeAttr('required');
        $("#doc_3").val('');
        $("#doc_3_name").val('');
    });
    $('#cancelA4').click(function(){
        $("#uploadDiv4").attr("data-upload-div-value", "0");
        $('#uploadDiv4').hide(); 
        $('#cancelLabel3').show();
        $("#doc_4").removeAttr('required');
        $("#doc_4_name").removeAttr('required');
        $("#doc_4").val('');
        $("#doc_4_name").val('');
    });
    $('#cancelA5').click(function(){
        $("#uploadDiv5").attr("data-upload-div-value", "0");
        $('#uploadDiv5').hide(); 
        $('#cancelLabel4').show();
        $("#doc_5").removeAttr('required');
        $("#doc_5_name").removeAttr('required');
        $("#doc_5").val('');
        $("#doc_5_name").val('');
    });
    $('#cancelA6').click(function(){
        $("#uploadDiv6").attr("data-upload-div-value", "0");
        $('#uploadDiv6').hide(); 
        $('#cancelLabel5').show();
        $("#doc_6").removeAttr('required');
        $("#doc_6_name").removeAttr('required');
        $("#doc_6").val('');
        $("#doc_6_name").val('');
    });
    $('#cancelA7').click(function(){
        $("#uploadDiv7").attr("data-upload-div-value", "0");
        $('#uploadDiv7').hide(); 
        $('#cancelLabel6').show();
        $("#doc_7").removeAttr('required');
        $("#doc_7_name").removeAttr('required');
        $("#doc_7").val('');
        $("#doc_7_name").val('');
    });
    $('#cancelA8').click(function(){
        $("#uploadDiv8").attr("data-upload-div-value", "0");
        $('#uploadDiv8').hide(); 
        $('#cancelLabel7').show();
        $("#doc_8").removeAttr('required');
        $("#doc_8_name").removeAttr('required');
        $("#doc_8").val('');
        $("#doc_8_name").val('');
    });
    $('#cancelA9').click(function(){
        $("#uploadDiv9").attr("data-upload-div-value", "0");
        $('#uploadDiv9').hide(); 
        $('#cancelLabel8').show();
        $("#doc_9").removeAttr('required');
        $("#doc_9_name").removeAttr('required');
        $("#doc_9").val('');
        $("#doc_9_name").val('');
    });
    $('#cancelA10').click(function(){
        $("#uploadDiv10").attr("data-upload-div-value", "0");
        $('#uploadDiv10').hide(); 
        $('#cancelLabel9').show();
        $("#doc_10").removeAttr('required');
        $("#doc_10_name").removeAttr('required');
        $("#doc_10").val('');
        $("#doc_10_name").val('');
    });



        $(document).ready(function(){

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function(){
            // alert("hii");
            // return false;
            // data-attribute="step1"
            var dataDurationtime=$("#step1").attr("data-attribute");
            var dataDurationtime1=$("#step2").attr("data-attribute");
            var dataDurationtime2=$("#submit").attr("data-attribute");
            // alert(dataDurationtime1)
            if(dataDurationtime=="step1"){
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
                if(surname=='' || givenname=='' || gender=='' || date_of_birth=='' || birth_place=='' || birth_country=='' || nationality=='' || marital_status=='' || previous_nationality==''){
                    alert('All fields are mandatory');
                    document.getElementById ('surname').setCustomValidity('');
                    // surname.setCustomValidity( "Please enter Retuen Date." );
                    document.getElementById ('surname').setCustomValidity( "Please enter Retuen Date." );
                    document.surname.focus ( );
                    document.setCustomValidity ('');
                //     // document.getElementById('returning_date').setCustomValidity('');
                    // surname.setCustomValidity("This field cannot be left blank");
                    // surname.setCustomValidity("");
                    return false;
                }else{
                    // data-attribute
                    $('#step2').attr('data-attribute','step2') ; 
                }
            }
            if(dataDurationtime1=="step2"){
                var present_address=$('#present_address').val();
                var profession=$('#profession').val();
                var mother_name=$('#mother_name').val();
                var mother_nationality=$('#mother_nationality').val();
                var mother_prev_nationality=$('#mother_prev_nationality').val();
                var mother_birth_country=$('#mother_birth_country').val();
                var mobile=$('#mobile').val();
                var email=$('#email').val();
                var other_info=$('#other_info').val();
                // alert('surname1');
                // var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                // var emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
                // var emailExp =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var emailExp =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                if(present_address=='' || profession=='' || mother_name=='' || mother_nationality=='' || mother_prev_nationality=='' || mobile=='' || email=='' || other_info==''){
                    alert("All fields are mandatory");
                    return false;
                }else if(!emailExp.test(email)){
                    alert("please enter valid email Id");
                    return false; 
                }else{
                    $('#submit').attr('data-attribute','step3') ; 
                }
            }
            if(dataDurationtime2=="step3"){
                // alert(dataDurationtime2);
                var persondiv1=$('#personDiv1').attr('data-person-value');
                if(persondiv1==1){
                    var email1 =$('#email1').val();
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
                    if(email1=='' || first_name1=='' || last_name1==''){
                        // alert("All fields are mandatory");
                        // alert("All fields are mandatory");
                        alert('Enter email and first name and last name');
                        return false;
                    }else{
                        varRegister();
                    }
                }else{
                    varRegister();
                }
                // alert('surname2');
                // return false;
                
            }
            
            





            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

             //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function(){

            var dataDurationtime=$("#step1").attr("data-attribute");
            var dataDurationtime1=$("#step2").attr("data-attribute");
            var dataDurationtime2=$("#submit").attr("data-attribute");
            // alert(dataDurationtime);
            // alert(dataDurationtime1);
            // alert(dataDurationtime2);
            if(dataDurationtime2==''){
                $("#step2").attr("data-attribute","");
            }
            if(dataDurationtime2!=''){
                $("#submit").attr("data-attribute","");
            }

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(--current);
        });

        function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
        }
        });
    </script>

    <!-- javascript write here -->
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
            }else{
                $('#doc_2_name').attr('required','required')
            }
        });

        $("#doc_3").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#doc_3").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }else{
                $('#doc_3_name').attr('required','required')
            }
        });

        $("#doc_4").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#doc_4").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }else{
                $('#doc_4_name').attr('required','required')
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

       

    });
   
</script>

@endsection