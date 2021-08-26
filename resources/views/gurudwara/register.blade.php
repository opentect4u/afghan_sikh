@extends('common.master')
@section('content')

<!-- <link href="{{ asset('public/css/userform.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
        <h2 data-aos="fade-up">Apply Now</h2>
        <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. 
        </p>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">Sign Up Your Gurdwara Account</h2>
                    <p>Fill all form field to go to next step</p>
                    <form class="myForm" id="msform" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Account</strong></li>
                            <li id="personal"><strong>Details</strong></li>
                            <li id="personal"><strong>Head</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Account Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 4</h2>
                                    </div>
                                </div> 
                                <label class="fieldlabels">Gurdwara Name: *</label> 
                                <input type="text" name="gurudwara_name" id="gurudwara_name" placeholder="Gurdwara Name" /> 
                                <label class="fieldlabels">Email Id: *</label> 
                                <input type="email" name="gurudwara_email" id="gurudwara_email" placeholder="Email Id" /> 
                                <label class="fieldlabels">Password: *</label> 
                                <input type="password" name="password" id="password"placeholder="Password" /> 
                                <label class="fieldlabels">Confirm Password: *</label> 
                                <input type="password" name="cpwd" id="cpwd" placeholder="Confirm Password" />
                            </div> 
                            <input type="button" name="step1" id="step1" data-attribute="step1" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Gurdwara Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div> 
                                <label class="fieldlabels">Address: *</label> 
                                <textarea name="gurudwara_address" id="gurudwara_address"  rows="3" placeholder="Address"></textarea>
                                <label class="fieldlabels">City: *</label> 
                                <input type="text" name="city" id="city" placeholder="City" /> 
                                <label class="fieldlabels">State: *</label> 
                                <input type="text" name="state" id="state" placeholder="State" /> 
                                <label class="fieldlabels">Country: *</label> 
                                <select name="country" id="country">
                                  <option value=""> --Select Country-- </option>
                                  @foreach($country as $countries)
                                  <option value="{{$countries->id}}">{{$countries->name}}</option>
                                  @endforeach
                                </select>
                                <label class="fieldlabels">Phone No: *</label> 
                                <input type="number" name="gurudwara_phone_no" id="gurudwara_phone_no" placeholder="Phone No" /> 
                                <label class="fieldlabels">Website : *</label> 
                                <input type="text" name="website" id="website" placeholder="Website" /> 
                            </div> 
                            <input type="button" name="step2" id="step2" data-attribute="" class="next action-button" value="Next" /> 
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Gurdwara Head:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 4</h2>
                                    </div>
                                </div> 
                                <label class="fieldlabels">Gurdwara Head Name : *</label> 
                                <input type="text" name="gurudwara_head_name" id="gurudwara_head_name" placeholder="Gurdwara Head Name" /> 
                                <label class="fieldlabels">Gurdwara Head Address : *</label> 
                                <textarea name="gurudwara_head_address" id="gurudwara_head_address"  rows="3" placeholder="Address"></textarea>
                                <label class="fieldlabels">Gurdwara Head Phone No : *</label> 
                                <input type="number" name="gurudwara_head_phone_no" id="gurudwara_head_phone_no" placeholder="Phone No" /> 
                                <label class="fieldlabels">Gurdwara Head Email Id : *</label> 
                                <input type="email" name="gurudwara_head_email" id="gurudwara_head_email" placeholder="Email Id" /> 
                                <!-- <input type="file" name="gurudwara_head_photo" id="gurudwara_head_photo" accept="image/*">  -->

                            </div> 
                            <input type="button" name="submit" id="submit" data-attribute="" class="next action-button" value="Submit" /> 
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4 - 4</h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                    </div>
                                </div>
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
