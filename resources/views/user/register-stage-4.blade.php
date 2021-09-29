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
                        <form id="msform" name="msform" method="POST" action="{{route('user.registerstep4confirm')}}" autocomplete="off">
                            @csrf
                            <input type="text" hidden name="register_stage" id="register_stage" value="4"/>
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
                                    <!-- *Adress Line 1/Adress Line 2/*city/*Postal/zip code/Phone No. -->
                                    <!-- House no/name, street name, city, county, postcode, country -->
                                    <label class="fieldlabels">House No/Name: *</label> 
                                    <input type="text" name="add_1" value="{{isset($editdata)?$editdata->add_1:''}}" required class="form-control" id="add_1" placeholder="House No/Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Street Name: </label> 
                                    <input type="text" name="add_2" value="{{isset($editdata)?$editdata->add_2:''}}" required class="form-control" id="add_2" placeholder="Street Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">City: *</label> 
                                    <input type="text" name="city" value="{{isset($editdata)?$editdata->city:''}}" required class="form-control" id="city" placeholder="City" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">County: *</label> 
                                    <input type="text" name="county" value="{{isset($editdata)?$editdata->county:''}}" required class="form-control" id="county" placeholder="County" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Postal/zip code: *</label> 
                                    <input type="text" name="postcode" value="{{isset($editdata)?$editdata->postcode:''}}" required class="form-control" id="postcode" placeholder="Postal/zip code" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <label class="fieldlabels">Country: *</label> 
                                    <select name="country" id="country" required>
                                        <option value="">-- Select Country --</option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" <?php if(isset($editdata) && $editdata->country==$countries->id){echo "selected";}?>>{{$countries->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="fieldlabels">Phone No: </label> 
                                    <br/>
                                    <input type="text" class="col-sm-3" value="{{isset($editdata)?$editdata->country_code:''}}"  name="country_code" id="country_code" placeholder="Country Code" />
                                    <!-- <select name="country_code" id="country_code" >
                                            <option value="">--Select Country Code--</option>
                                            <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                            <option data-countryCode="AO" value="244">Angola (+244)</option>
                                            <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                            <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                            <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                            <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                            <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                            <option data-countryCode="AU" value="61">Australia (+61)</option>
                                            <option data-countryCode="AT" value="43">Austria (+43)</option>
                                            <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                            <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                            <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                            <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                            <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                            <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                            <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                            <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                            <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                            <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                            <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                            <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                            <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                            <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                            <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                            <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                            <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                            <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                            <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                            <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                            <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                            <option data-countryCode="CA" value="1">Canada (+1)</option>
                                            <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                            <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                            <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                            <option data-countryCode="CL" value="56">Chile (+56)</option>
                                            <option data-countryCode="CN" value="86">China (+86)</option>
                                            <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                            <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                            <option data-countryCode="CG" value="242">Congo (+242)</option>
                                            <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                            <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                            <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                            <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                            <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                            <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                            <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                            <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                            <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                            <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                            <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                            <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                            <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                            <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                            <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                            <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                            <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                            <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                            <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                            <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                            <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                            <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                            <option data-countryCode="FI" value="358">Finland (+358)</option>
                                            <option data-countryCode="FR" value="33">France (+33)</option>
                                            <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                            <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                            <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                            <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                            <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                            <option data-countryCode="DE" value="49">Germany (+49)</option>
                                            <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                            <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                            <option data-countryCode="GR" value="30">Greece (+30)</option>
                                            <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                            <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                            <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                            <option data-countryCode="GU" value="671">Guam (+671)</option>
                                            <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                            <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                            <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                            <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                            <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                            <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                            <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                            <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                            <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                            <option data-countryCode="IN" value="91">India (+91)</option>
                                            <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                            <option data-countryCode="IR" value="98">Iran (+98)</option>
                                            <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                            <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                            <option data-countryCode="IL" value="972">Israel (+972)</option>
                                            <option data-countryCode="IT" value="39">Italy (+39)</option>
                                            <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                            <option data-countryCode="JP" value="81">Japan (+81)</option>
                                            <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                            <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                            <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                            <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                            <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                            <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                            <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                            <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                            <option data-countryCode="LA" value="856">Laos (+856)</option>
                                            <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                            <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                            <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                            <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                            <option data-countryCode="LY" value="218">Libya (+218)</option>
                                            <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                            <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                            <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                            <option data-countryCode="MO" value="853">Macao (+853)</option>
                                            <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                            <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                            <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                            <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                            <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                            <option data-countryCode="ML" value="223">Mali (+223)</option>
                                            <option data-countryCode="MT" value="356">Malta (+356)</option>
                                            <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                            <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                            <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                            <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                            <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                            <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                            <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                            <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                            <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                            <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                            <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                            <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                            <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                            <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                            <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                            <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                            <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                            <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                            <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                            <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                            <option data-countryCode="NE" value="227">Niger (+227)</option>
                                            <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                            <option data-countryCode="NU" value="683">Niue (+683)</option>
                                            <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                            <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                            <option data-countryCode="NO" value="47">Norway (+47)</option>
                                            <option data-countryCode="OM" value="968">Oman (+968)</option>
                                            <option data-countryCode="PW" value="680">Palau (+680)</option>
                                            <option data-countryCode="PA" value="507">Panama (+507)</option>
                                            <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                            <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                            <option data-countryCode="PE" value="51">Peru (+51)</option>
                                            <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                            <option data-countryCode="PL" value="48">Poland (+48)</option>
                                            <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                            <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                            <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                            <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                            <option data-countryCode="RO" value="40">Romania (+40)</option>
                                            <option data-countryCode="RU" value="7">Russia (+7)</option>
                                            <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                            <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                            <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                            <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                            <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                            <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                            <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                            <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                            <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                            <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                            <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                            <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                            <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                            <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                            <option data-countryCode="ES" value="34">Spain (+34)</option>
                                            <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                            <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                            <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                            <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                            <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                            <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                            <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                            <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                            <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                            <option data-countryCode="SI" value="963">Syria (+963)</option>
                                            <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                            <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                            <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                            <option data-countryCode="TG" value="228">Togo (+228)</option>
                                            <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                            <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                            <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                            <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                            <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                            <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                            <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                            <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                            <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                            <option data-countryCode="GB" value="44">UK (+44)</option>
                                            <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                            <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                            <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                            <option data-countryCode="US" value="1">USA (+1)</option>
                                            <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                            <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                            <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                            <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                            <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                            <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                            <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                            <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                            <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                            <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                            <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                            <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                        
                                    </select> -->
                                    <input type="number" name="phone" value="{{isset($editdata)?$editdata->phone:''}}" class="col-sm-8" id="phone" placeholder="Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    

                                   
                                </div> 
                                <input type="Submit" name="step1" id="step1" data-attribute="step1" class="action-button" value="Save & Continue" />
                                <input type="button" name="previous" class="action-button" value="Previous" onclick="location.href='{{route('user.registerstep3')}}'"/>
									
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
