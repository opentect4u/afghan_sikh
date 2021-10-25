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
                                <label>Enter User Id to get Details:  </label>
                                <input type="text" name="user_id" id="user_id" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> </label>
                                <a href="javascript:void(0)" onclick="GetDetails();" class="btn btn-outline-primary" style="margin-top:30px;">Get Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ceremony of Shri : * </label>
                                <input type="text" required name="ceremony_of_shri" id="ceremony_of_shri" value="<?php 
                                if(isset($editdata)){
                                    echo $editdata->ceremony_of_shri;
                                }else{
                                    if($userdata->gender=="M"){
                                        echo $userdata->surname.' '.$userdata->givenname;
                                    }
                                }?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Son of Shri : * </label>
                                <input type="text" required name="son_of_shri" id="son_of_shri" value="<?php 
                                if(isset($editdata)){
                                    echo $editdata->son_of_shri;
                                }else{
                                    if($userdata->gender=="M"){
                                        echo $userdata->father_name;
                                    }
                                }?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ceremony of Shrimati : * </label>
                                <input type="text" required name="with_shrimati" id="with_shrimati" value="<?php 
                                if(isset($editdata)){
                                    echo $editdata->with_shrimati;
                                }else{
                                    if($userdata->gender=="F"){
                                        echo $userdata->surname.' '.$userdata->givenname;
                                    }
                                }?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Daughter of Shrimati : * </label>
                                <input type="text" required name="daughter_of_shri" id="daughter_of_shri" value="<?php 
                                if(isset($editdata)){
                                    echo $editdata->daughter_of_shri;
                                }else{
                                    if($userdata->gender=="F"){
                                        echo $userdata->father_name;
                                    }
                                }?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Marriage : * </label>
                                <input type="text" required name="date_of_marriage" id="date_of_marriage" placeholder="DD-MM-YYYY" value="{{isset($editdata)? date('d-m-Y',strtotime($editdata->date_of_marriage)):''}}" class="form-control" />
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
                                <textarea name="remark" id="remark" class="form-control">{{isset($editdata)? $editdata->remark:''}}</textarea>
                                <!-- <input type="text" name="remark" id="remark" class="form-control" /> -->
                            </div>
                        </div>
                    </div>
                    

                    

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                               <label class="fieldlabels"> Document 1 : * (.jpeg/.jpg/.png/.pdf, max size 2mb)</label> 
                                @if(isset($editdata) && $editdata->doc_1!='')
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_1}}" width="100" height="100"/>
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
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_2}}" width="100" height="100"/>
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
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_3}}" width="100" height="100"/>
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
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_4}}" width="100" height="100"/>
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
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_5}}" width="100" height="100"/>
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
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_6}}" width="100" height="100"/>
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
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_3}}" width="100" height="100"/>
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
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_8}}" width="100" height="100"/>
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
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_9}}" width="100" height="100"/>
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
                                &nbsp;&nbsp;&nbsp;
                                <img src="{{asset('public/certificate-doc/').'/'.$editdata->doc_10}}" width="100" height="100"/>
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
    function GetDetails(){
        // alert('hii');
        var login_user_gender='<?php if(isset($userdata)){echo $userdata->gender;}?>';
        var user_id=$('#user_id').val();
        if(user_id!=''){
            // alert(login_user_gender);
            $.ajax({
                type: "POST",
                url: "{{ route('user.getdetails') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "user_id":user_id
                },
                success: function(data){
                    // alert(data);
                    var obj = JSON.parse ( data );
                    var name=obj.name;
                    var father_name=obj.father_name;
                    if(father_name=='' && name==''){
                        alert("No data available");
                    }else if(login_user_gender=='M'){
                        // alert(name);
                        $('#with_shrimati').empty();
                        $('#daughter_of_shri').empty();
                        $('#with_shrimati').val(name);
                        $('#daughter_of_shri').val(father_name);
                    }else if(login_user_gender=='F'){
                        $('#ceremony_of_shri').empty();
                        $('#son_of_shri').empty();
                        $('#ceremony_of_shri').val(name);
                        $('#son_of_shri').val(father_name);

                    }

                    // $("#accept").hide();
                    // $("#deny").hide();
                    
                }
            });
        }else{
            alert('Enter user id to get details');
        }
    }
</script>

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
                $('#doc_2_name').attr('required','required');
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
                $('#doc_3_name').attr('required','required');
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
                $('#doc_4_name').attr('required','required');
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


  

  });
</script>
@endsection