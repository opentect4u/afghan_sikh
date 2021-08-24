@extends('common.master')
@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Apply Now for {{$purpose}}</h2>
          <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. 
		 </p>
        @if(Session::has('success'))
            <b>Succssfully register</b>
        @endif
        @if(Session::has('error'))
            <b>Registeration Failed</b>
        @endif
        <!-- <b>Registeration Failed</b> -->

        </div>

      
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-xl-9 col-lg-12 mt-4">
          <div class="form-row php-email-form">
            <div class="col-md-6 form-group">

                <input type="radio" id="html" name="fav_language" value="Self" checked>
                <label for="html">Self</label>&nbsp;&nbsp;<input type="radio" id="css" name="fav_language" value="Family">
                <label for="css">Family</label>
            </div>
                <div class="col-md-6 form-group" >
                  <!-- <input type="text" class="form-control" name="enter_email" id="enter_email" placeholder="Your Email"  data-msg="Please enter a valid email" /> -->
                  <!-- <div class="validate"></div> -->
                </div>

                <div class="col-md-6 form-group" id="enter_emailDiv">
                  <input type="text" class="form-control" name="enter_email" id="enter_email" placeholder="Your Email"  data-msg="Please enter a valid email" />
                  <div class="validate" id="enter_email_validate"></div>
                </div>
                <!-- <div class="col-md-6 form-group" id="enter_registration_noDiv">
                  <input type="text" class="form-control" name="enter_registration_no" id="enter_registration_no" placeholder="Your Registration No" data-rule="registration_no" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div> -->

                <div class="col-md-6 form-group" >
                  <input type="button" class="form-control applyCustom" name="apply" id="apply" value="Apply"/>
                  <!-- <div class="validate"></div> -->
                </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-xl-9 col-lg-12 mt-4" id="selfRegisterDiv">
            <form action="{{route('user.registerservicesConfirm')}}" method="POST" role="form" id="regmyform" class="php-email-form">
            <!-- <form action="{{route('user.registerservicesConfirm')}}" method="POST" role="form" class="php-email-form"> -->
                @csrf
                <input type="hidden" name="register_by" id="register_by" value=""/>
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" required  data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
                <!-- <div class="col-md-6 form-group">
                  <input type="text" class="form-control" name="registration_no" id="registration_no" required placeholder="Your Registration No" data-rule="registration_no" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div> -->
                
                <div class="col-md-6 form-group">
                  <input type="text" name="surname" class="form-control" id="surname" required placeholder="Surname (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="text" name="givenname" class="form-control" id="givenname" required placeholder="Given Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <!-- <input type="text" name="gender" class="form-control" id="gender" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                    <select name="gender" id="gender" class="form-control" >
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                  <div class="validate"></div>
                </div>
                
            <div class="col-md-6 form-group">
                    <input type="date" name="date" class="form-control" id="date" required placeholder="Date of Birth" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    
                    <div class="validate"></div>
                    </div>
            
            <div class="col-md-6 form-group">
                    <input type="text" name="birth_place" class="form-control" id="birth_place" required placeholder="Place of Birth Town/City" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    
                    <div class="validate"></div>
                    </div>
              
	        <div class="col-md-6 form-group">
                  <!-- <input type="text" name="birth_country" class="form-control" id="birth_place" placeholder="Country of Birth:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                  <select name="birth_country" id="birth_country" class="form-control" required>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                  <div class="validate"></div>
                </div>
                
                <div class="col-md-6 form-group">
                  <!-- <input type="text" name="nationality" class="form-control" id="birth_place" placeholder="Current Nationality:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                  <select name="nationality" id="nationality" class="form-control" required>
                                        <option value=""> --Select Current Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                  <div class="validate"></div>
                </div>
                
                <div class="col-md-6 form-group">
                  <!-- <input type="text" name="previous_nationality" class="form-control" id="birth_place" placeholder="Any Other Previous/Past Nationality:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                  <select name="previous_nationality" id="previous_nationality" class="form-control" required>
                                        <option value=""> --Select Any Other Previous/Past Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                  <div class="validate"></div>
                </div>
                
                
                
                <div class="col-md-6 form-group">
                  <!-- <input type="text" name="marital_status" class="form-control" id="birth_place" placeholder="Marital Status:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                  <select name="marital_status" id="marital_status" class="form-control" required>
                                        <option value=""> --Select marital status-- </option>
                                        <option value="Unmarried">Unmarried</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                  <div class="validate"></div>
                </div>
                
                
                <div class="col-md-6 form-group">
                  <input type="text" name="religion" class="form-control" id="religion" required placeholder="Religion" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                
                
                <div class="col-md-6 form-group">
                  <input type="text" name="present_address" class="form-control" id="present_address" required placeholder="Present Home Address:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                
                
                <div class="col-md-6 form-group">
                  <input type="text" name="profession" class="form-control" id="profession" required placeholder="Profession/Occupation:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                
                <div class="col-md-6 form-group">
                  <input type="text" name="father_name" class="form-control" id="father_name" required placeholder="Father Name :" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                
                <div class="col-md-6 form-group">
                  <!-- <input type="text" name="father_nationality" class="form-control" id="birth_place" placeholder="Father Nationality:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                  <select name="father_nationality" id="father_nationality" class="form-control" required>
                                        <option value=""> --Select Father Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                  <div class="validate"></div>
                </div>
                
                <div class="col-md-6 form-group">
                  <!-- <input type="text" name="father_prev_nationality" class="form-control" id="birth_place" placeholder="Prev. Nationality:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                  <select name="father_prev_nationality" id="father_prev_nationality" class="form-control" required>
                                        <option value=""> --Select Father Prev. Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                  <div class="validate"></div>
                </div>
                
                  <div class="col-md-6 form-group">
                  <!-- <input type="text" name="father_birth_country" class="form-control" id="birth_place" placeholder="Place/Country of Birth:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                  <select name="father_birth_country" id="father_birth_country" class="form-control" required>
                                        <option value=""> --Place/Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                  <div class="validate"></div>
                </div>
                
                
                  <div class="col-md-6 form-group">
                  <input type="number" name="mobile" class="form-control" id="mobile" required placeholder="Phone or Mobile :" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                
               <!-- <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div> -->
              </div> 
           	  
              <div class="form-group">
                <textarea class="form-control" name="other_info" id="other_info" required rows="5" placeholder="Other Information"></textarea>
                <div class="validate"></div>
              </div>
              <!-- <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. We will touch with you soon . Thank you!</div>
              </div> -->
              <div class="text-center"><button type="submit" name="submit" id="submit">Send Message</button></div>
            </form>
          </div>

          <div class="col-xl-9 col-lg-12 mt-4" id="familyRegisterDiv">
            <form action="{{route('user.registerservicesfamilyConfirm')}}" method="POST" role="form" id="regmyform" class="php-email-form">
            <!-- <form action="{{route('user.registerservicesConfirm')}}" method="POST" role="form" class="php-email-form"> -->
                @csrf
                <input type="hidden" name="register_by" id="register_by" value=""/>
                <input type="hidden" name="family_email" id="family_email" value=""/>
              <div class="form-row">
                <div class="col-md-6 form-group">
                <input type="text" class="form-control" name="first_name1" id="first_name1" required placeholder="First Name (As in Passport):" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                <input type="text"  class="form-control" name="middle_name1" id="middle_name1" placeholder="Middle Name (As in Passport):"  data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                
                <div class="col-md-6 form-group">
                <input type="text" class="form-control" name="last_name1" id="last_name1" placeholder="Last Name (As in Passport):"  data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <!-- <div class="col-md-6 form-group">
                  <input type="text" name="givenname" class="form-control" id="givenname" required placeholder="Given Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div> -->
                <div class="col-md-6 form-group">
                  <!-- <input type="text" name="gender" class="form-control" id="gender" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                    <select name="gender1" id="gender1" class="form-control" >
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                  <div class="validate"></div>
                </div>
                
            <div class="col-md-6 form-group">
            <select name="relation1" id="relation1" class="form-control">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                    <!-- <input type="date" name="date" class="form-control" id="date" required placeholder="Date of Birth" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                    
                    <div class="validate"></div>
                    </div>
            
            <div class="col-md-6 form-group">
            <select name="current_citizenship1" id="current_citizenship1" class="form-control">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                    <!-- <input type="text" name="birth_place" class="form-control" id="birth_place" required placeholder="Place of Birth Town/City" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                    
                    <div class="validate"></div>
                    </div>
                    <div class="col-md-6 form-group">
                    <select name="previous_citizenship1" id="previous_citizenship1" class="form-control" >
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="validate"></div>
                    </div>
	        <div class="col-md-6 form-group">
                  <!-- <input type="text" name="birth_country" class="form-control" id="birth_place" placeholder="Country of Birth:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                  <select name="birth_country" id="birth_country" class="form-control" required>
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                  <div class="validate"></div>
                </div>

	            <div class="col-md-6 form-group">
                    <input type="text" name="passport_no1" id="passport_no1"  class="form-control" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                    <div class="col-md-6 form-group">
                    <input type="text" name="passport_date_of_issue1" id="passport_date_of_issue1"  class="form-control" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                    <div class="col-md-6 form-group">
                    <input type="text" name="passport_date_of_expiry1" id="passport_date_of_expiry1"  class="form-control" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                    <div class="col-md-6 form-group">
                    <input type="text" name="other_doc_1_1" id="other_doc_1_1"  class="form-control" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                    <div class="col-md-6 form-group">
                    <input type="text" name="other_doc_2_1" id="other_doc_2_1"  class="form-control" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                </div>
                
               
              </div> 
           	  
              <!-- <div class="form-group">
                <textarea class="form-control" name="other_info" id="other_info" required rows="5" placeholder="Other Information"></textarea>
                <div class="validate"></div>
              </div> -->
              <!-- <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. We will touch with you soon . Thank you!</div>
              </div> -->
              <div class="text-center"><button type="submit" name="fsubmit" id="fsubmit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>
    <!-- End Contact Section -->

@endsection


@section('script')

    <!-- javascript write here -->
<script>
    $(document).ready(function(){
        // alert("hii");
        // $('#enter_email').hide();
        $('#enter_registration_noDiv').hide();
        $('#familyRegisterDiv').hide();
        // selfRegisterDiv
        // $('#selfRegisterDiv input').attr('disabled');
        $('#selfRegisterDiv > form > div > div > input').attr('readonly', 'readonly');
        $('#selfRegisterDiv > form > div > div > select').attr('disabled', 'disabled');
        $('#selfRegisterDiv > form > div > textarea').attr('readonly', 'readonly');
        // $('#selfRegisterDiv > form > div > button').attr('readonly', 'readonly');
        $('#submit').attr('disabled','disabled');
        $('#familyRegisterDiv > form > div > div > input').attr('readonly', 'readonly');
        $('#familyRegisterDiv > form > div > div > select').attr('disabled', 'disabled');
        $('#familyRegisterDiv > form > div > textarea').attr('readonly', 'readonly');
        // $('#selfRegisterDiv > form > div > button').attr('readonly', 'readonly');
        $('#fsubmit').attr('disabled','disabled');

        var radio = $('input[name="fav_language"]:checked').val();
        // alert(radio);
        $('#css').click(function(){
            // alert("hii");
            // $('#enter_email').val('');
            $('#selfRegisterDiv').hide();
            $('#familyRegisterDiv').show();
        })

        $('#html').click(function(){
            // alert("hii");
            // $('#enter_registration_no').val('');
            
            $('#selfRegisterDiv').show();
            $('#familyRegisterDiv').hide();
        })

        $('#apply').click(function(){
            
            var email=$('#enter_email').val();
            var registration_no=$('#enter_registration_no').val();
            if(email=='' || registration_no==''){
                alert("please enter email id or registration no.")
                return false;
            }else{
            AjaxCall(email,registration_no);
            }
        });
        
        // $( "#enter_email" ).change(function() {
        //     // alert("hii");
        //     var email=$('#enter_email').val();
        //     var registration_no=$('#enter_registration_no').val();
        //     AjaxCall(email,registration_no);
        // });

        // $( "#enter_registration_no" ).change(function() {
        //     // alert("hii");
        //     var email=$('#enter_email').val();
        //     var registration_no=$('#enter_registration_no').val();
        //     AjaxCall(email,registration_no);
        // });
        

       
    });
    function AjaxCall(email,registration_no){
        var radio = $('input[name="fav_language"]:checked').val();
        // alert(email);
        // regmyform
        $('#register_by').val('');
        $('#register_by').val(radio);
        // var email$('#enter_email').val();
        
        $('#family_email').val('');
        $('#family_email').val(email);
        // alert(email);
        $.ajax({
                type: "POST",
                url: "{{ route('user.registerAjax') }}",
                data:{email:email,registration_no:registration_no,radio:radio},
                success: function(data){
                    // alert(data);
                    var obj = JSON.parse ( data );
                    // var user_details=obj.generate_user_id;
                    // alert(user_details);

                    // user_details
                    var generate_user_id=obj.generate_user_id;
                    var surname=obj.surname;
                    var givenname=obj.givenname;
                    var gender=obj.gender;
                    var date_of_birth=obj.date_of_birth;
                    var birth_place=obj.birth_place;
                    var birth_country=obj.birth_country;
                    var nationality=obj.nationality;
                    var previous_nationality=obj.previous_nationality;
                    var marital_status=obj.marital_status;
                    var religion=obj.religion;
                    var present_address=obj.present_address;
                    var profession=obj.profession;
                    var father_name=obj.father_name;
                    var father_nationality=obj.father_nationality;
                    var father_prev_nationality=obj.father_prev_nationality;
                    var father_birth_country=obj.father_birth_country;
                    var mobile=obj.mobile;
                    var dataemail=obj.email;
                    var other_info=obj.other_info;
                    var active=obj.active;
                    var purpose=obj.purpose;
                    // var remark=obj.generate_user_id;
                    $('#surname').val('');
                    $('#surname').val(surname);
                    $('#givenname').val('');
                    $('#givenname').val(givenname);
                    $('#gender').val('');
                    $('#gender').val(gender);
                    $('#date').val('');
                    $('#date').val(date_of_birth);
                    $('#birth_place').val('');
                    $('#birth_place').val(birth_place);

                    $('#birth_country').val('');
                    $('#birth_country').val(birth_country);
                    $('#nationality').val('');
                    $('#nationality').val(nationality);
                    $('#previous_nationality').val('');
                    $('#previous_nationality').val(previous_nationality);
                    $('#marital_status').val('');
                    $('#marital_status').val(marital_status);
                    $('#religion').val('');
                    $('#religion').val(religion);
                    $('#father_name').val('');
                    $('#father_name').val(father_name);
                    $('#father_nationality').val('');
                    $('#father_nationality').val(father_nationality);
                    $('#father_prev_nationality').val('');
                    $('#father_prev_nationality').val(father_prev_nationality);
                    $('#father_birth_country').val('');
                    $('#father_birth_country').val(father_birth_country);
                    $('#mobile').val('');
                    $('#mobile').val(mobile);
                    $('#email').val('');
                    $('#email').val(dataemail);
                    // $('#other_info').val('');
                    // $('#other_info').val(other_info);
                    
                    $('#present_address').val('');
                    $('#present_address').val(present_address);
                    $('#profession').val('');
                    $('#profession').val(profession);
                    // registration_no
                    $('#registration_no').val('');
                    $('#registration_no').val(generate_user_id);
                    // alert("ddd"+dataemail);
                  if(dataemail != ''){
                    $('#selfRegisterDiv > form > div > textarea').removeAttr('readonly');
                    // $('#selfRegisterDiv > form > div > div > select').removeAttr('disabled');

                    // $('#selfRegisterDiv > form > div > button').attr('readonly', 'readonly');
                    $('#submit').removeAttr('disabled');

                    $('#familyRegisterDiv > form > div > textarea').removeAttr('readonly');
                    // $('#selfRegisterDiv > form > div > div > select').removeAttr('disabled');

                    // $('#selfRegisterDiv > form > div > button').attr('readonly', 'readonly');
                    $('#fsubmit').removeAttr('disabled');
                  }else{
                    $('#enter_email_validate').empty();
                    $('#enter_email_validate').append('pendig for approval from admin');
                    $('#enter_email_validate').show();
                    
                  }
                }
            });
    }
</script>

@endsection