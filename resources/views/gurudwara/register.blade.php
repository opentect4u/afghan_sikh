@extends('common.master')
@section('content')

<!-- <link href="{{ asset('public/css/userform.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
        <h2 data-aos="fade-up">Apply Now</h2>
        <p data-aos="fade-up">Afghan Sikh organisation is a registered, United Kingdom based, non-profit organization. 
        </p>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading" class="loginTitle">Sign Up Your Gurdwara Account</h2>
                    <h5>Fill all form field to go to next step</h5>
                    <form class="myForm" id="msform" method="POST" action="{{route('gurudwara.registerconfirm')}}" enctype="multipart/form-data">
                        @csrf
                        <!-- progressbar -->
                        <!-- <ul id="progressbar">
                            <li class="active" id="account"><strong>Account</strong></li>
                            <li id="personal"><strong>Details</strong></li>
                            <li id="personal"><strong>Head</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> 
                        <br>  -->
                        <!-- fieldsets -->
                        <fieldset>
							<div class="afghanLogin">
                            <div class="form-card">
                                <!-- <div class="row">
                                    <div class="col-7 register_title">
                                        <h2 class="fs-title">Account Information:</h2>
                                    </div>
                                    <div class="col-5 stepSec">
                                        <h2 class="steps">Step 1 - 4</h2>
                                    </div>
                                </div>  -->
                                @if(Session::has('already'))
                                    <label class="errorMsg" style="color:red;">Email id or mobile number already registered </label> 
                                @endif
                                </br>
                                <label class="fieldlabels">Type of Organisation: *</label> 
                                <select required name="type_of_organisation" id="type_of_organisation" oninput="setCustomValidity('')">
                                    <option value="">--Type of Organisation--</option>
                                    <option value="G">Gurdwara</option>
                                    <option value="C">Community</option>
                                    <option value="O">Organisation</option>
                                </select>
                                <label class="fieldlabels">Name of Organisation: *</label> 
                                <input type="text" name="gurudwara_name" id="gurudwara_name" required pattern="[A-Za-z]{2,90}" placeholder="Name of Organisation" /> 
                                <label class="fieldlabels">Country: *</label> 
                                <select name="country" id="country" required>
                                    <option value=""> --Country of Organisation-- </option>
                                    @foreach($country as $countries)
                                    <option value="{{$countries->id}}">{{$countries->name}}</option>
                                    @endforeach
                                </select>
                                <label class="fieldlabels">Email *</label> 
                                <input type="email" name="email" required class="form-control" id="email" placeholder="Enter Email" />
                                <label class="fieldlabels">Phone No *</label>
                                <br/> 
                                <select name="country_code" id="country_code" required class="col-sm-5">
                                    <option value="">--Country Code--</option>
                                    @foreach($country as $countries)
                                    <option value="{{$countries->dialing}}" <?php if(isset($editdata) && $editdata->country_code==$countries->dialing){echo "selected";}?>>{{$countries->dialing}}</option>
                                    @endforeach
                                </select>
                                <input type="number" name="phone" required class="col-sm-6" id="phone" placeholder="Enter Phone No" />
                                <br/>
                                <label class="fieldlabels">Password: *</label> 
                                <input required type="password" name="password" id="password"placeholder="Password" oninput="setCustomValidity('')" /> 
                                <label class="fieldlabels">Confirm Password: *</label> 
                                <input required type="password" name="cpwd" id="cpwd" placeholder="Confirm Password" oninput="setCustomValidity('')" />
                            </div> 
                            <input type="submit" name="step1" id="step1" data-attribute="step1" class="action-button" value="Next" />
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
            
            var type_of_organisation=$("#type_of_organisation").val();
            var email_mobile=$("#email_mobile").val();
            var password=$("#password").val();
            var con_password=$("#cpwd").val();
            var regex = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|(^[0-9]{})+$');
            // var regex = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|(^[0-9]{10})+$');
            // if(type_of_organisation==''){
            //     document.getElementById ('uname').setCustomValidity( "Please enter valid email address or phone number." );
            //     document.msform.uname.focus ( );
            //     uname.setCustomValidity ('');
            //     return false;
            // }else if(password==''){
            //     return false;
            // }else if(con_password==''){
            //     return false;
            // }else 
            // if(email_mobile!=''){
            //     if(!regex.test(email_mobile)){
            //         alert("Please enter valid email address or phone number.");
            //         return false;
            //     }
            // }else
             if (password!=con_password) {
                alert('Password and confirm password must be same!');
                return false;
            }
        });

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function(){
            // alert("hii");
            // return false;

            var dataDurationtime=$("#step1").attr("data-attribute");
            var dataDurationtime1=$("#step2").attr("data-attribute");
            var dataDurationtime2=$("#submit").attr("data-attribute");
            // alert(dataDurationtime1)
            if(dataDurationtime=="step1"){
                var gurudwara_name=$('#gurudwara_name').val();
                var gurudwara_email=$('#gurudwara_email').val();
                var password=$('#password').val();
                var cpwd=$('#cpwd').val();
                var emailExp =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
               
                if(gurudwara_name=='' || gurudwara_email=='' || password=='' || cpwd==''){
                    alert('All fields are mandatory');
                    return false;
                }else if(!emailExp.test(gurudwara_email)){
                    alert("please enter valid email Id");
                    return false; 
                }else if(password!=cpwd){
                    alert('Password and confirm password didn`t match!');
                    return false;
                }else{
                    // data-attribute
                    $('#step2').attr('data-attribute','step2') ; 
                }
            }
            if(dataDurationtime1=="step2"){
                var gurudwara_address=$('#gurudwara_address').val();
                var city=$('#city').val();
                var state=$('#state').val();
                var country=$('#country').val();
                var gurudwara_phone_no=$('#gurudwara_phone_no').val();
                var website=$('#website').val();

                if(gurudwara_address=='' || city=='' || state=='' || country=='' || gurudwara_phone_no==''){
                    alert("All fields are mandatory except website");
                    return false;
                }else{
                    $('#submit').attr('data-attribute','step3') ; 
                }
            }
            if(dataDurationtime2=="step3"){
                // alert(dataDurationtime2);
                var gurudwara_head_name=$('#gurudwara_head_name').val();
                var gurudwara_head_address=$('#gurudwara_head_address').val();
                var gurudwara_head_phone_no=$('#gurudwara_head_phone_no').val();
                var gurudwara_head_email=$('#gurudwara_head_email').val();
                var emailExp =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(gurudwara_head_name=='' || gurudwara_head_address=='' || gurudwara_head_phone_no==''){
                    alert("All fields are mandatory except email");
                    return false;
                }else if(gurudwara_head_email!=''){
                    if(!emailExp.test(gurudwara_head_email)){
                        alert("please enter valid email Id");
                        return false; 
                    }else{
                        RegisterAjax();
                    }
                }else{
                    RegisterAjax();
                    // $('#submit').attr('data-attribute','step3') ; 
                }               
               
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
    // step1
    // $("#step1").click(function(){
    //     // alert("hii");
    //     // return true;
    // })

    // all details addb here
    
    // $('#submit').on('submit',(function(event) {
    // $(".myForm").submit(function(event){
      // $("body").on("submit", ".myForm", function(evt) {
    // $("#submit").click(function(){
    //     //   alert("hiif")
    //   // $("#msform").submit();
    //   // $("#msform").submit(function(event){
    //   //   alert("hii");
    //   // })

    //   // alert("hii")
    //   // event.preventDefault();
    //   // var formData = new FormData(this);
    //   // var formData = new FormData($("#msform")[0]);
    //   // alert(formData);
    //   var gurudwara_name=$('#gurudwara_name').val();
    //   var gurudwara_email=$('#gurudwara_email').val();
    //   var password=$('#password').val();
    //   var gurudwara_phone_no=$('#gurudwara_phone_no').val();
    //   var website=$('#website').val();
    //   var gurudwara_address=$('#gurudwara_address').val();
    //   var city=$('#city').val();
    //   var state=$('#state').val();
    //   var country=$('#country').val();
    //   var gurudwara_photo=$('#gurudwara_photo').val();
    //   var gurudwara_head_name=$('#gurudwara_head_name').val();
    //   var gurudwara_head_address=$('#gurudwara_head_address').val();
    //   var gurudwara_head_phone_no   =$('#gurudwara_head_phone_no').val();
    //   var gurudwara_head_email=$('#gurudwara_head_email').val();
    //   var gurudwara_head_photo=$('#gurudwara_head_photo').val();
    //   // {gurudwara_name:gurudwara_name,gurudwara_email:gurudwara_email,password:password,gurudwara_phone_no:gurudwara_phone_no,
    //   //   website:website,gurudwara_address:gurudwara_address,city:city,state:state,country:country,gurudwara_photo:gurudwara_photo,
    //   //   gurudwara_head_name:gurudwara_head_name,gurudwara_head_address:gurudwara_head_address,gurudwara_head_phone_no:gurudwara_head_phone_no,
    //   //   gurudwara_head_email:gurudwara_head_email,gurudwara_head_photo:gurudwara_head_photo}

    //   // alert(gurudwara_head_photo);
    //   $.ajax({
    //     type: "POST",
    //     url: "{{ route('gurudwara.registerconfirm') }}",
    //     // data:{gurudwara_name:gurudwara_name,gurudwara_email:gurudwara_email,password:password,gurudwara_phone_no:gurudwara_phone_no,
    //     // website:website,gurudwara_address:gurudwara_address,city:city,state:state,country:country,gurudwara_photo:gurudwara_photo,
    //     // gurudwara_head_name:gurudwara_head_name,gurudwara_head_address:gurudwara_head_address,gurudwara_head_phone_no:gurudwara_head_phone_no,
    //     // gurudwara_head_email:gurudwara_head_email,gurudwara_head_photo:gurudwara_head_photo},
    //     data:{gurudwara_name:gurudwara_name,gurudwara_email:gurudwara_email,password:password,gurudwara_phone_no:gurudwara_phone_no,
    //     website:website,gurudwara_address:gurudwara_address,city:city,state:state,country:country,
    //     gurudwara_head_name:gurudwara_head_name,gurudwara_head_address:gurudwara_head_address,gurudwara_head_phone_no:gurudwara_head_phone_no,
    //     gurudwara_head_email:gurudwara_head_email},
    //     success: function(data){
    //         alert(data);
    //         // var obj = JSON.parse ( data );
    //         // var msg=obj.msg;
    //         // $("#accept").hide();
    //         // $("#deny").hide();
            
    //     }
    //   });

    // });
    // }));

  });

  function RegisterAjax(){
    var gurudwara_name=$('#gurudwara_name').val();
      var gurudwara_email=$('#gurudwara_email').val();
      var password=$('#password').val();
      var gurudwara_phone_no=$('#gurudwara_phone_no').val();
      var website=$('#website').val();
      var gurudwara_address=$('#gurudwara_address').val();
      var city=$('#city').val();
      var state=$('#state').val();
      var country=$('#country').val();
      var gurudwara_photo=$('#gurudwara_photo').val();
      var gurudwara_head_name=$('#gurudwara_head_name').val();
      var gurudwara_head_address=$('#gurudwara_head_address').val();
      var gurudwara_head_phone_no   =$('#gurudwara_head_phone_no').val();
      var gurudwara_head_email=$('#gurudwara_head_email').val();
      var gurudwara_head_photo=$('#gurudwara_head_photo').val();
      // {gurudwara_name:gurudwara_name,gurudwara_email:gurudwara_email,password:password,gurudwara_phone_no:gurudwara_phone_no,
      //   website:website,gurudwara_address:gurudwara_address,city:city,state:state,country:country,gurudwara_photo:gurudwara_photo,
      //   gurudwara_head_name:gurudwara_head_name,gurudwara_head_address:gurudwara_head_address,gurudwara_head_phone_no:gurudwara_head_phone_no,
      //   gurudwara_head_email:gurudwara_head_email,gurudwara_head_photo:gurudwara_head_photo}

      // alert(gurudwara_head_photo);
      $.ajax({
        type: "POST",
        url: "{{ route('gurudwara.registerconfirm') }}",
        // data:{gurudwara_name:gurudwara_name,gurudwara_email:gurudwara_email,password:password,gurudwara_phone_no:gurudwara_phone_no,
        // website:website,gurudwara_address:gurudwara_address,city:city,state:state,country:country,gurudwara_photo:gurudwara_photo,
        // gurudwara_head_name:gurudwara_head_name,gurudwara_head_address:gurudwara_head_address,gurudwara_head_phone_no:gurudwara_head_phone_no,
        // gurudwara_head_email:gurudwara_head_email,gurudwara_head_photo:gurudwara_head_photo},
        data:{gurudwara_name:gurudwara_name,gurudwara_email:gurudwara_email,password:password,gurudwara_phone_no:gurudwara_phone_no,
        website:website,gurudwara_address:gurudwara_address,city:city,state:state,country:country,
        gurudwara_head_name:gurudwara_head_name,gurudwara_head_address:gurudwara_head_address,gurudwara_head_phone_no:gurudwara_head_phone_no,
        gurudwara_head_email:gurudwara_head_email},
        success: function(data){
            // alert(data);
            // var obj = JSON.parse ( data );
            // var msg=obj.msg;
            // $("#accept").hide();
            // $("#deny").hide();
            
        }
      });
  }
</script>

@endsection
