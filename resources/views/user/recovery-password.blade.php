@extends('common.master')
@section('content')


<!-- <link href="{{ asset('public/css/userform.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"  />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"  />

<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">
        
        <div class="section-title">
            <h2 data-aos="fade-up">Apply Now</h2>
            <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. 
            </p>
        </div>

        <!-- <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="300"> -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
						<h2 id="heading" class="loginTitle">Sign Up</h2>
                        <h5>Fill all form field to go to next step</h5>
                        <!-- <p>Fill all form field to go to next step</p> -->
                        <!-- <form id="msform" name="msform" method="POST" action="{{route('user.registerconfirmwithout')}}"> -->
                        <form id="msform" name="msform" method="POST" action="{{route('user.recoverpasswordConfirm')}}" autocomplete="off">
                            @csrf
                            <input hidden type="text" id="id" name="id" value="{{$id}}" />
                            <!-- progressbar -->
                            <!-- <ul id="progressbar">
                                <li class="active" id="account"><strong>Step 1</strong></li>
                                <li id="personal"><strong>Step 2</strong></li>
                                <li id="payment"><strong>Step 3</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>  -->
                            <br> <!-- fieldsets -->
                            <fieldset>
								<div class="afghanLogin">
                                <div class="form-card">
                                    <!-- <div class="row">
                                        <div class="col-7 register_title">
                                            <h2 class="fs-title">Personal Information:</h2>
                                        </div>
                                        <div class="col-5 stepSec">
                                            <h2 class="steps">Step 1 - 4</h2>
                                        </div>
                                    </div>  -->
		                            @if(Session::has('already'))
                                    <label class="errorMsg" style="color:red;">Email id or mobile number already registered</label> 
                                    @endif
                                    </br>
                                    <label class="fieldlabels">Password: *</label> 
                                    <input type="password" name="password" required class="form-control" id="password" placeholder="Password:" />
                                    <label class="fieldlabels">Confirm Password : *</label> 
                                    <input type="password" name="con_password" id="con_password" required placeholder="Confirm Password:" />
                                </div> 
                                <input type="Submit" name="step1" id="step1" data-attribute="step1" class="action-button" value="Change password" />
									
								</div>
                            </fieldset>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

  

        

    </div>
</section>
<!-- End Contact Section -->

@endsection
@section('script')

<script>
    $(document).ready(function(){

        $("#step1").click(function(){
            // var email_mobile=$("#email_mobile").val();
            var password=$("#password").val();
            var con_password=$("#con_password").val();
            // var regex = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|(^[0-9]{})+$');
            var regex = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|(^[0-9]{10})+$');
            // var regex = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|(^[0-9]{9,12})+$');

            if (password!=con_password) {
                alert('Password and confirm password did not match!');
                return false;
            }
        });
        

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
        //     var father_name=$('#father_name').val();
        //     var father_nationality=$('#father_nationality').val();
        //     var father_prev_nationality=$('#father_prev_nationality').val();
        //     var father_birth_country=$('#father_birth_country').val();
        //     var mobile=$('#mobile').val();
        //     var email=$('#email').val();
        //     var other_info=$('#other_info').val();
        // //     {surname:surname,givenname:givenname,gender:gender,date_of_birth:date_of_birth,birth_country:birth_country,nationality:nationality
        // //     ,previous_nationality:previous_nationality,marital_status:marital_status,religion:religion,present_address:present_address,
        // //     profession:profession,father_name:father_name,father_nationality:father_nationality,father_prev_nationality:father_prev_nationality
        // // ,father_birth_country:father_birth_country,mobile:mobile,email:email,other_info:other_info}
            
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
        //     profession:profession,father_name:father_name,father_nationality:father_nationality,father_prev_nationality:father_prev_nationality
        //     ,father_birth_country:father_birth_country,mobile:mobile,email:email,other_info:other_info,
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
        $('#date').datepicker({ 
            autoclose: true,
            endDate: new Date(),
            dateFormat: 'dd/mm/yyyy'
            // startDate: new Date()
        });

        // addMember section
        $('#personDiv1').hide();
        $('#personDiv2').hide();
        $('#personDiv3').hide();
        $('#personDiv4').hide();
        $('#personDiv5').hide();
        $('#personDiv6').hide();
        $('#personDiv7').hide();
        $('#personDiv8').hide();
        $('#personDiv9').hide();
        $('#personDiv10').hide();
        $('#addMember').click(function(){
            // alert("hii");
            var personDiv1=$("#personDiv1").attr("data-person-value");
            var personDiv2=$("#personDiv2").attr("data-person-value");
            var personDiv3=$("#personDiv3").attr("data-person-value");
            var personDiv4=$("#personDiv4").attr("data-person-value");
            var personDiv5=$("#personDiv5").attr("data-person-value");
            var personDiv6=$("#personDiv6").attr("data-person-value");
            var personDiv7=$("#personDiv7").attr("data-person-value");
            var personDiv8=$("#personDiv8").attr("data-person-value");
            var personDiv9=$("#personDiv9").attr("data-person-value");
            var personDiv10=$("#personDiv10").attr("data-person-value");

            $("#personDiv1").attr("data-person-value", "1");
            $('#personDiv1').show();

            if(personDiv1==1){
                $("#personDiv2").attr("data-person-value", "1");
                $('#personDiv2').show();
                $('#cancelLabel1').hide();
            }
            if(personDiv2==1){
                $("#personDiv3").attr("data-person-value", "1");
                $('#personDiv3').show();
                $('#cancelLabel2').hide();
            }
            if(personDiv3==1){
                $("#personDiv4").attr("data-person-value", "1");
                $('#personDiv4').show();
                $('#cancelLabel3').hide();
            }
            if(personDiv4==1){
                $("#personDiv5").attr("data-person-value", "1");
                $('#personDiv5').show();
                $('#cancelLabel4').hide();
            }
            if(personDiv5==1){
                $("#personDiv6").attr("data-person-value", "1");
                $('#personDiv6').show();
                $('#cancelLabel5').hide();
            }
            if(personDiv6==1){
                $("#personDiv7").attr("data-person-value", "1");
                $('#personDiv7').show();
                $('#cancelLabel6').hide();
            }
            if(personDiv7==1){
                $("#personDiv8").attr("data-person-value", "1");
                $('#personDiv8').show();
                $('#cancelLabel7').hide();
            }
            if(personDiv8==1){
                $("#personDiv9").attr("data-person-value", "1");
                $('#personDiv9').show();
                $('#cancelLabel8').hide();
            }
            if(personDiv9==1){
                $("#personDiv10").attr("data-person-value", "1");
                $('#personDiv10').show();
                $('#addMember').hide();
                $('#cancelLabel9').hide();
            }

        });


        $('#cancelMember1').click(function(){
            $("#personDiv1").attr("data-person-value", "0");
            $("#personDiv1").hide();
        });

        $('#cancelMember2').click(function(){
            $("#personDiv2").attr("data-person-value", "0");
            $("#personDiv2").hide();
            $('#cancelLabel1').show();
        });

        $('#cancelMember3').click(function(){
            $("#personDiv3").attr("data-person-value", "0");
            $("#personDiv3").hide();
            $('#cancelLabel2').show();
        });

        $('#cancelMember4').click(function(){
            $("#personDiv4").attr("data-person-value", "0");
            $("#personDiv4").hide();
            $('#cancelLabel3').show();
        });
        $('#cancelMember5').click(function(){
            $("#personDiv5").attr("data-person-value", "0");
            $("#personDiv5").hide();
            $('#cancelLabel4').show();
        });
        $('#cancelMember6').click(function(){
            $("#personDiv6").attr("data-person-value", "0");
            $("#personDiv6").hide();
            $('#cancelLabel5').show();
        });
        $('#cancelMember7').click(function(){
            $("#personDiv7").attr("data-person-value", "0");
            $("#personDiv7").hide();
            $('#cancelLabel6').show();
        });
        $('#cancelMember8').click(function(){
            $("#personDiv8").attr("data-person-value", "0");
            $("#personDiv8").hide();
            $('#cancelLabel7').show();
        });
        $('#cancelMember9').click(function(){
            $("#personDiv9").attr("data-person-value", "0");
            $("#personDiv9").hide();
            $('#cancelLabel8').show();
        });
        $('#cancelMember10').click(function(){
            $("#personDiv10").attr("data-person-value", "0");
            $("#personDiv10").hide();
            $('#cancelLabel9').show();
            $('#addMember').show();

        });



    });
    function varRegister(){
        // statusMsg
        // satusImg
        // msgMsg
        $('#statusMsg').empty();
        $('#satusImg').removeAttr('src');
        $('#msgMsg').empty();
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
            var present_address=$('#present_address').val();
            var profession=$('#profession').val();
            var father_name=$('#father_name').val();
            var father_nationality=$('#father_nationality').val();
            var father_prev_nationality=$('#father_prev_nationality').val();
            var father_birth_country=$('#father_birth_country').val();
            var mobile=$('#mobile').val();
            var email=$('#email').val();
            var other_info=$('#other_info').val();
        //     {surname:surname,givenname:givenname,gender:gender,date_of_birth:date_of_birth,birth_country:birth_country,nationality:nationality
        //     ,previous_nationality:previous_nationality,marital_status:marital_status,religion:religion,present_address:present_address,
        //     profession:profession,father_name:father_name,father_nationality:father_nationality,father_prev_nationality:father_prev_nationality
        // ,father_birth_country:father_birth_country,mobile:mobile,email:email,other_info:other_info}
            
            // Family member details
            var email1=$('#email1').val();
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
            // {first_name1:first_name1,middle_name1:middle_name1,last_name1:last_name1,gender1:gender1,
            // relation1:relation1,current_citizenship1:current_citizenship1,previous_citizenship1:previous_citizenship1,
            // passport_no1:passport_no1,passport_date_of_issue1:passport_date_of_issue1,passport_date_of_expiry1:passport_date_of_expiry1
            // ,other_doc_1_1:other_doc_1_1,other_doc_2_1:other_doc_2_1}
            
            // alert(email1);
            $.ajax({
                type: "POST",
                url: "{{ route('user.registerconfirm') }}",
                data:{surname:surname,givenname:givenname,gender:gender,date_of_birth:date_of_birth,birth_place:birth_place,birth_country:birth_country,nationality:nationality
            ,previous_nationality:previous_nationality,marital_status:marital_status,religion:religion,present_address:present_address,
            profession:profession,father_name:father_name,father_nationality:father_nationality,father_prev_nationality:father_prev_nationality
            ,father_birth_country:father_birth_country,mobile:mobile,email:email,other_info:other_info,
            email1:email1,first_name1:first_name1,middle_name1:middle_name1,last_name1:last_name1,gender1:gender1,
            relation1:relation1,current_citizenship1:current_citizenship1,previous_citizenship1:previous_citizenship1,
            passport_no1:passport_no1,passport_date_of_issue1:passport_date_of_issue1,passport_date_of_expiry1:passport_date_of_expiry1
            ,other_doc_1_1:other_doc_1_1,other_doc_2_1:other_doc_2_1},
                success: function(data){
                    alert(data);
                    var obj = JSON.parse ( data );
                    var msg=obj.msg;
                    var imgurl='https://i.imgur.com/GwStPmg.png';
                    if(msg=="success"){
                        $('#statusMsg').append('SUCCESS !');
                        $('#satusImg').attr('src',imgurl);
                        $('#msgMsg').append('Form Submited Successfully Pending for approval'); 
                    }else if(msg=="already"){
                        $('#statusMsg').append('FAILED !');
                        // $('#satusImg').attr('src',imgurl);
                        $('#msgMsg').append('Already Submited This Email Id or Phone No'); 
                    }
                    // $('#statusMsg').empty();
                    // $('#satusImg').removeAttr();
                    // $('#msgMsg').empty();
                    
                }
            });
    }
</script>

@endsection
