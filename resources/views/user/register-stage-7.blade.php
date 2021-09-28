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
                        <form id="msform" name="msform" method="POST" action="{{route('user.registerstep7confirm')}}" autocomplete="off">
                            @csrf
                            <input type="text" hidden name="register_stage" id="register_stage" value="7"/>
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

                                    <!-- Mother's Name,*Mother's  Nationality,Mother's  Previous/Past Nationality,*Mother's  Place/Country of Birth, -->
                                    <label class="fieldlabels">Mother's Name: *</label> 
                                    <input type="text" required name="mother_name" id="mother_name" placeholder="Mother's Name :" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Mother's Nationality: *</label> 
                                    <select name="mother_nationality" id="mother_nationality" required>
                                        <option value=""> --Select Mother's Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fieldlabels">Mother's Previous/Past Nationality: </label> 
                                    <select name="mother_prev_nationality" id="mother_prev_nationality">
                                        <option value=""> --Select Mother's Previous/Past Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fieldlabels">Mother's Place of Birth: *</label> 
                                    <input type="text" required name="mother_place_birth" id="mother_place_birth" placeholder="Father's Place of Birth" />
                                    <label class="fieldlabels">Mother's Country of Birth: *</label> 
                                    <select name="mother_birth_country" id="mother_birth_country" required>
                                        <option value=""> --Mother's Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                                                       
                                </div> 
                                <input type="Submit" name="step1" id="step1" data-attribute="step1" class="action-button" value="Save & Continue" />
									
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
            var mother_name=$('#mother_name').val();
            var mother_nationality=$('#mother_nationality').val();
            var mother_prev_nationality=$('#mother_prev_nationality').val();
            var mother_birth_country=$('#mother_birth_country').val();
            var mobile=$('#mobile').val();
            var email=$('#email').val();
            var other_info=$('#other_info').val();
        //     {surname:surname,givenname:givenname,gender:gender,date_of_birth:date_of_birth,birth_country:birth_country,nationality:nationality
        //     ,previous_nationality:previous_nationality,marital_status:marital_status,religion:religion,present_address:present_address,
        //     profession:profession,mother_name:mother_name,mother_nationality:mother_nationality,mother_prev_nationality:mother_prev_nationality
        // ,mother_birth_country:mother_birth_country,mobile:mobile,email:email,other_info:other_info}
            
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
            profession:profession,mother_name:mother_name,mother_nationality:mother_nationality,mother_prev_nationality:mother_prev_nationality
            ,mother_birth_country:mother_birth_country,mobile:mobile,email:email,other_info:other_info,
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
