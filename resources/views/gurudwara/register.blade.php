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
                    <h2 id="heading">Sign Up Your User Account</h2>
                    <p>Fill all form field to go to next step</p>
                    <form class="myForm" id="msform" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Account</strong></li>
                            <li id="personal"><strong>Personal</strong></li>
                            <li id="payment"><strong>Image</strong></li>
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
                                <input type="text" name="gurudwara_name" id="gurudwara_name" placeholder="Gurudwara Name" /> 
                                <!-- <label class="fieldlabels">Email: *</label>  -->
                                <input type="email" name="gurudwara_email" id="gurudwara_email" placeholder="Email Id" /> 
                                <!-- <label class="fieldlabels">Phone: *</label>  -->
                                <!-- <input type="number" name="phone_no" id="phone_no" placeholder="Phone No" />  -->
                                <!-- <label class="fieldlabels">Password: *</label>  -->
                                <input type="password" name="password" id="password"placeholder="Password" /> 
                                <!-- <label class="fieldlabels">Confirm Password: *</label>  -->
                                <input type="password" name="cpwd" id="cpwd" placeholder="Confirm Password" />
                            </div> 
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Personal Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div> 
                                <input type="number" name="gurudwara_phone_no" id="gurudwara_phone_no" placeholder="Phone No" /> 
                                <input type="text" name="website" id="website" placeholder="Website" /> 
                                <textarea name="gurudwara_address" id="gurudwara_address"  rows="3" placeholder="Address"></textarea>
                                <!-- <input type="text" name="address" id="address" placeholder="Address" />  -->
                                <input type="text" name="city" id="city" placeholder="City" /> 
                                <input type="text" name="state" id="state" placeholder="State" /> 

                                <select name="country" id="country">
                                  <option value=""> --Select Current Citizenship-- </option>
                                  @foreach($country as $countries)
                                  <option value="{{$countries->id}}">{{$countries->name}}</option>
                                  @endforeach
                                </select>
                                <!-- <input type="file" name="gurudwara_photo" id="gurudwara_photo" accept="image/*">  -->

                               
                            </div> 
                            <input type="button" name="next" class="next action-button" value="Next" /> 
                            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Image Upload:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 4</h2>
                                    </div>
                                </div> 
                                <input type="text" name="gurudwara_head_name" id="gurudwara_head_name" placeholder="Gurudwara Head Name" /> 
                                <textarea name="gurudwara_head_address" id="gurudwara_head_address"  rows="3" placeholder="Address"></textarea>
                                <input type="number" name="gurudwara_head_phone_no" id="gurudwara_head_phone_no" placeholder="Phone No" /> 
                                <input type="email" name="gurudwara_head_email" id="gurudwara_head_email" placeholder="Email Id" /> 
                                <!-- <input type="file" name="gurudwara_head_photo" id="gurudwara_head_photo" accept="image/*">  -->

                            </div> 
                            <input type="submit" name="submit" id="submit" class="next action-button" value="Submit" /> 
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
    $("#step1").click(function(){
        // alert("hii");
        // return true;
    })

    // all details addb here
    
    // $('#submit').on('submit',(function(event) {
    // $(".myForm").submit(function(event){
      // $("body").on("submit", ".myForm", function(evt) {
    $("#submit").click(function(){
      alert("hiif")
      // $("#msform").submit();
      // $("#msform").submit(function(event){
      //   alert("hii");
      // })

      // alert("hii")
      // event.preventDefault();
      // var formData = new FormData(this);
      // var formData = new FormData($("#msform")[0]);
      // alert(formData);
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

    });
    // }));

  });
</script>

@endsection
