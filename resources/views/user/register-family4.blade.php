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
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <label class="fieldlabels">Upload Document 1 : *</label> 
                            <input type="file" <?php if(isset($editdata) && $editdata->other_doc_1!=''){echo "";}else{echo "required";}?> name="other_doc_1" id="other_doc_1" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                               <label class="fieldlabels">Upload Document 2 : *</label> 
                            <input type="file" <?php if(isset($editdata) && $editdata->other_doc_2!=''){echo "";}else{echo "required";}?> name="other_doc_2" id="other_doc_2" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
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
                              <label class="fieldlabels">Upload Document 3 : </label> 
                              <input type="file" name="other_doc_3" id="other_doc_3" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                               <label class="fieldlabels">Upload Document 4 : </label> 
                            <input type="file" name="other_doc_4" id="other_doc_4" class="form-control" accept="image/gif, image/jpg, image/jpeg, application/pdf" />
                                
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
        $("#other_doc_1").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#other_doc_1").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }
        });
        $("#other_doc_2").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#other_doc_2").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }
        });

        $("#other_doc_3").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#other_doc_3").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
            }
        });

        $("#other_doc_4").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("File of maximum 2MB");
                $("#other_doc_4").val(''); 
                // $("#doc_1").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return false;
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