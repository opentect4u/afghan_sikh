@extends('common.master')
@section('content')


<!-- <link href="{{ asset('public/css/userform.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"  />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"  />

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
                        <h5>Fill all form field to go to next step</h5>
                        <!-- <p>Fill all form field to go to next step</p> -->
                        <!-- <form id="msform" name="msform" method="POST" action="{{route('user.registerconfirmwithout')}}"> -->
                        <form id="msform" name="msform" method="POST" action="">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Step 1</strong></li>
                                <li id="personal"><strong>Step 2</strong></li>
                                <li id="payment"><strong>Step 3</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> <br> <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Personal Information:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 1 - 4</h2>
                                        </div>
                                    </div> 
                                    <label class="fieldlabels">Surname (As in Passport): *</label> 
                                    <input type="text" name="surname" required class="form-control" id="surname" placeholder="Surname (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Given Name (As in Passport): *</label> 
                                    <input type="text" name="givenname" class="form-control" id="givenname" placeholder="Given Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Gender : *</label> 
                                    <select name="gender" id="gender">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Other</option>
                                    </select>
                                    <label class="fieldlabels">DOB : *</label> 
                                    <input type="date" name="date" id="date" placeholder="Date of Birth" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Birth Place : *</label> 
                                    <input type="text" name="birth_place" id="birth_place" placeholder="Place of Birth Town/City" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Birth Country : *</label> 
                                    <select name="birth_country" id="birth_country">
                                        <option value=""> --Select Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fieldlabels">Current Nationality : *</label> 
                                    <select name="nationality" id="nationality">
                                        <option value=""> --Select Current Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fieldlabels">Previous/Past Nationality : *</label> 
                                    <select name="previous_nationality" id="previous_nationality">
                                        <option value=""> --Select Previous/Past Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fieldlabels">Marital Status : *</label> 
                                    <select name="marital_status" id="marital_status">
                                        <option value=""> --Select marital status-- </option>
                                        <option value="Unmarried">Unmarried</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Divorced">Divorced</option>
                                    </select>
                                    <label class="fieldlabels">Religion : *</label> 
                                    <input type="text" name="religion" id="religion" placeholder="Religion" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                </div> 
                                <input type="button" name="step1" id="step1" data-attribute="step1" class="next action-button" value="Next" />
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
                                    <label class="fieldlabels">Present Home Address : *</label> 
                                    <textarea name="present_address" id="present_address" rows="3" placeholder="Present Home Address:"></textarea>
                                    <label class="fieldlabels">Profession/Occupation : *</label> 
                                    <input type="text" name="profession" id="profession" placeholder="Profession/Occupation:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Father Name : *</label> 
                                    <input type="text" name="father_name" id="father_name" placeholder="Father Name :" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Father Nationality : *</label> 
                                    <select name="father_nationality" id="father_nationality">
                                        <option value=""> --Select Father Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fieldlabels">Father Previous/Past Nationality : *</label> 
                                    <select name="father_prev_nationality" id="father_prev_nationality">
                                        <option value=""> --Select Previous/Past Nationality-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fieldlabels">Father Place/Country of Birth : *</label> 
                                    <select name="father_birth_country" id="father_birth_country">
                                        <option value=""> --Select Place/Country of Birth-- </option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}">{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fieldlabels">Mobile : *</label> 
                                    <input type="number" name="mobile" id="mobile" placeholder="Phone or Mobile :" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Email : *</label> 
                                    <input type="email" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <label class="fieldlabels">Other Information : *</label> 
                                    <textarea name="other_info" id="other_info"  rows="5" placeholder="Other Information"></textarea>
                                </div> 
                                <input type="button" name="step2" id="step2" data-attribute="" class="next action-button" value="Next" /> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="fs-title">Family Information:</h2>
                                        </div>
                                        <div class="col-5">
                                            <h2 class="steps">Step 3 - 4</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="">(Add upto 10 member)</p>
                                        </div>
                                        <!-- <div class="col-5">
                                            <h2 class="steps">Step 3 - 4</h2>
                                        </div> -->
                                    </div>
                                    <div id="personDiv1" data-person-value="0"> 
                                        <label class="fieldlabels">Person 1 </label> </br>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name1" id="first_name1" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name1" id="middle_name1" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name1" id="last_name1" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Gender : *</label> 
                                        <select name="gender1" id="gender1">
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="O">Other</option>
                                        </select>
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation1" id="relation1">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship1" id="current_citizenship1">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship1" id="previous_citizenship1">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email1" id="email1" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no1" id="passport_no1" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="date" name="passport_date_of_issue1" id="passport_date_of_issue1" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="date" name="passport_date_of_expiry1" id="passport_date_of_expiry1" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_1" id="other_doc_1_1" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_1" id="other_doc_2_1" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel1"><a href="javascript:void(0)" id="cancelMember1" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 
                                    </div>
                                    <div id="personDiv2" data-person-value="0"> 
                                        <label class="fieldlabels">Person 2 </label> </br>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name2" id="" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name2" id="" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name2" id="" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <!-- <input type="text" name="gender2" id="gender1" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                                        <label class="fieldlabels">Gender : *</label> 
                                        <select name="gender2" id="gender2">
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="O">Other</option>
                                        </select>
                                        <!-- <input type="text" name="relation2" id="relation1" placeholder="Relation" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation2" id="relation2">
                                            <!-- <option value="">Relation </option> -->
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship2" id="current_citizenship2">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship2" id="previous_citizenship2">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email2" id="email2" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no2" id="" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="text" name="passport_date_of_issue2" id="" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="text" name="passport_date_of_expiry2" id="" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_2" id="" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_2" id="" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel2"><a href="javascript:void(0)" id="cancelMember2" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 

                                    </div>
                                    <div id="personDiv3" data-person-value="0"> 
                                        <label class="fieldlabels">Person 3 </label> </br>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name3" id="" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name3" id="" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name3" id="" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Gender : *</label> 
                                        <input type="text" name="gender3" id="gender1" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <!-- <input type="text" name="relation2" id="relation1" placeholder="Relation" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation3" id="relation3">
                                            <!-- <option value="">Relation </option> -->
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship3" id="current_citizenship3">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship3" id="previous_citizenship3">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email3" id="email3" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no3" id="" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="text" name="passport_date_of_issue3" id="" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="text" name="passport_date_of_expiry3" id="" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_3" id="" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_3" id="" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel3"><a href="javascript:void(0)" id="cancelMember3" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 

                                    </div>
                                    <div id="personDiv4" data-person-value="0"> 
                                        <label class="fieldlabels">Person 4 </label> </br>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name4" id="" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name4" id="" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name4" id="" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Gender : *</label> 
                                        <input type="text" name="gender4" id="gender4" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <!-- <input type="text" name="relation2" id="relation1" placeholder="Relation" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation4" id="relation4">
                                            <!-- <option value="">Relation </option> -->
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship4" id="current_citizenship4">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship4" id="previous_citizenship4">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email4" id="email4" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no4" id="" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="text" name="passport_date_of_issue4" id="" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="text" name="passport_date_of_expiry4" id="" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_4" id="" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_4" id="" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel4"><a href="javascript:void(0)" id="cancelMember4" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 

                                    </div>
                                    <div id="personDiv5" data-person-value="0"> 
                                        <label class="fieldlabels">Person 5 </label> </br>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name5" id="" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name5" id="" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name5" id="" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Gender : *</label> 
                                        <input type="text" name="gender5" id="gender5" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <!-- <input type="text" name="relation2" id="relation1" placeholder="Relation" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation5" id="relation5">
                                            <!-- <option value="">Relation </option> -->
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship5" id="current_citizenship5">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship5" id="previous_citizenship5">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email5" id="email5" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no5" id="" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="text" name="passport_date_of_issue5" id="" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="text" name="passport_date_of_expiry5" id="" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_5" id="" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_5" id="" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel5"><a href="javascript:void(0)" id="cancelMember5" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 

                                    </div>
                                    <div id="personDiv6" data-person-value="0"> 
                                        <label class="fieldlabels">Person 6 </label> </br>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name6" id="" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name6" id="" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name6" id="" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Gender : *</label> 
                                        <input type="text" name="gender6" id="gender6" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <!-- <input type="text" name="relation2" id="relation1" placeholder="Relation" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation6" id="relation6">
                                            <!-- <option value="">Relation </option> -->
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship6" id="current_citizenship6">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship6" id="previous_citizenship6">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email6" id="email6" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no6" id="" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="text" name="passport_date_of_issue6" id="" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="text" name="passport_date_of_expiry6" id="" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_6" id="" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_6" id="" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel6"><a href="javascript:void(0)" id="cancelMember6" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 

                                    </div>
                                    <div id="personDiv7" data-person-value="0"> 
                                        <label class="fieldlabels">Person 7 </label> </br>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name7" id="" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name7" id="" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name7" id="" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Gender : *</label> 
                                        <input type="text" name="gender7" id="gender7" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <!-- <input type="text" name="relation2" id="relation1" placeholder="Relation" data-rule="minlen:4" data-msg="Please enter at least 4 chars" /> -->
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation7" id="relation7">
                                            <!-- <option value="">Relation </option> -->
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship7" id="current_citizenship7">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship7" id="previous_citizenship7">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email7" id="email7" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no7" id="" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="text" name="passport_date_of_issue7" id="" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="text" name="passport_date_of_expiry7" id="" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_7" id="" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_7" id="" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel7"><a href="javascript:void(0)" id="cancelMember7" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 

                                    </div>
                                    <div id="personDiv8" data-person-value="0"> 
                                        <label class="fieldlabels">Person 8 </label> </br>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name8" id="" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name8" id="" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name8" id="" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Gender : *</label> 
                                        <input type="text" name="gender8" id="gender8" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation8" id="relation8">
                                            <!-- <option value="">Relation </option> -->
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship8" id="current_citizenship8">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship8" id="previous_citizenship8">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email8" id="email8" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no8" id="" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="text" name="passport_date_of_issue8" id="" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="text" name="passport_date_of_expiry8" id="" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_8" id="" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_8" id="" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel8"><a href="javascript:void(0)" id="cancelMember8" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 

                                    </div>
                                    <div id="personDiv9" data-person-value="0"> 
                                        <label class="fieldlabels">Person 9 </label> </br>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name9" id="" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name9" id="" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name9" id="" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Gender : *</label> 
                                        <input type="text" name="gender9" id="gender9" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation9" id="relation9">
                                            <!-- <option value="">Relation </option> -->
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship9" id="current_citizenship9">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship9" id="previous_citizenship9">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email9" id="email9" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no9" id="" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="text" name="passport_date_of_issue9" id="" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="text" name="passport_date_of_expiry9" id="" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_9" id="" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_9" id="" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel9"><a href="javascript:void(0)" id="cancelMember9" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 

                                    </div>
                                    <div id="personDiv10" data-person-value="0"> 
                                        <label class="fieldlabels">Person 10 </label> <br/>
                                        <label class="fieldlabels">First Name (As in Passport) : *</label> 
                                        <input type="text" name="first_name10" id="" placeholder="First Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Middle Name (As in Passport) : </label> 
                                        <input type="text" name="middle_name10" id="" placeholder="Middle Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Last Name (As in Passport) : *</label> 
                                        <input type="text" name="last_name10" id="" placeholder="Last Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Gender : *</label> 
                                        <input type="text" name="gender10" id="gender10" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Relation : *</label> 
                                        <select name="relation10" id="relation10">
                                            <!-- <option value="">Relation </option> -->
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                        </select>
                                        <label class="fieldlabels">Current Citizenship : </label> 
                                        <select name="current_citizenship10" id="current_citizenship10">
                                            <option value=""> --Select Current Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Previous Citizenship : </label> 
                                        <select name="previous_citizenship10" id="previous_citizenship10">
                                            <option value=""> --Select Previous Citizenship-- </option>
                                            @foreach($country as $countries)
                                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                                            @endforeach
                                        </select>
                                        <label class="fieldlabels">Email : *</label> 
                                        <input type="email" name="email10" id="email10" placeholder="Email:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Number : </label> 
                                        <input type="text" name="passport_no10" id="" placeholder="Passport Number:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Issue : </label> 
                                        <input type="text" name="passport_date_of_issue10" id="" placeholder="Passport Date of Issue:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Passport Date of Expiry : </label> 
                                        <input type="text" name="passport_date_of_expiry10" id="" placeholder="Passport Date of Expiry:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-1 : </label> 
                                        <input type="text" name="other_doc_1_10" id="" placeholder="Other Doc-1:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels">Other Doc-2 : </label> 
                                        <input type="text" name="other_doc_2_10" id="" placeholder="Other Doc-2:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <label class="fieldlabels" id="cancelLabel10"><a href="javascript:void(0)" id="cancelMember10" style="color:#ffa716;"><i class="fa fa-times" aria-hidden="true"></i> cancel</a></label> 

                                    </div>
                                    <label class="fieldlabels"><a href="javascript:void(0)" id="addMember" style="color:#ffa716;"><i class="fa fa-plus" aria-hidden="true"></i> Add another member</a></label> 
                                    <!-- <label class="fieldlabels">Upload Your Photo:</label> 
                                    <input type="file" name="pic" accept="image/*"> 
                                    <label class="fieldlabels">Upload Signature Photo:</label> 
                                    <input type="file" name="pic" accept="image/*"> -->
                                </div> 
                                <input type="button" name="submit" id="submit" data-attribute="" class="next action-button" value="Submit" />
                                <!-- <input type="button" name="submit" id="submit" data-attribute="step3" class="next action-button" value="Submit" />  -->
                                <!-- <input type="submit" name="submit" id="submit" class="next action-button" value="Submit" />  -->
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
                                            <h5 class="purple-text text-center">Form Submited Successfully</h5>
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
                var father_name=$('#father_name').val();
                var father_nationality=$('#father_nationality').val();
                var father_prev_nationality=$('#father_prev_nationality').val();
                var father_birth_country=$('#father_birth_country').val();
                var mobile=$('#mobile').val();
                var email=$('#email').val();
                var other_info=$('#other_info').val();
                // alert('surname1');
                // var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
                // var emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
                // var emailExp =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                var emailExp =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                if(present_address=='' || profession=='' || father_name=='' || father_nationality=='' || father_prev_nationality=='' || mobile=='' || email=='' || other_info==''){
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
