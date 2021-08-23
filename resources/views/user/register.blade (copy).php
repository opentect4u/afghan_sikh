@extends('common.master')
@section('content')



<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Apply Now</h2>
      <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. 
     </p>
    </div>

  

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
      <div class="col-xl-9 col-lg-12 mt-4">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="form-row">
            
            <div class="col-md-6 form-group">
              <input type="text" name="surname" class="form-control" id="surname" placeholder="Surname (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
              <input type="text" name="givenname" class="form-control" id="givenname" placeholder="Given Name (As in Passport):" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
             <div class="col-md-6 form-group">
              <input type="text" name="gender" class="form-control" id="gender" placeholder="Gender" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
      <div class="col-md-6 form-group">
              <input type="date" name="date" class="form-control" id="date" placeholder="Date of Birth" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
     
      <div class="col-md-6 form-group">
              <input type="text" name="birth_place" class="form-control" id="birth_place" placeholder="Place of Birth Town/City" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
          
     <div class="col-md-6 form-group">
              <input type="text" name="birth_country" class="form-control" id="birth_place" placeholder="Country of Birth:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            <div class="col-md-6 form-group">
              <input type="text" name="nationality" class="form-control" id="birth_place" placeholder="Current Nationality:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            <div class="col-md-6 form-group">
              <input type="text" name="previous_nationality" class="form-control" id="birth_place" placeholder="Any Other Previous/Past Nationality:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            
            
            <div class="col-md-6 form-group">
              <input type="text" name="marital_status" class="form-control" id="birth_place" placeholder="Marital Status:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            
            <div class="col-md-6 form-group">
              <input type="text" name="religion" class="form-control" id="birth_place" placeholder="Religion" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            
            <div class="col-md-6 form-group">
              <input type="text" name="present_address" class="form-control" id="birth_place" placeholder="Present Home Address:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            
            <div class="col-md-6 form-group">
              <input type="text" name="profession" class="form-control" id="birth_place" placeholder="Profession/Occupation:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            <div class="col-md-6 form-group">
              <input type="text" name="father_name" class="form-control" id="birth_place" placeholder="Father Name :" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            <div class="col-md-6 form-group">
              <input type="text" name="father_nationality" class="form-control" id="birth_place" placeholder="Father Nationality:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            <div class="col-md-6 form-group">
              <input type="text" name="father_prev_nationality" class="form-control" id="birth_place" placeholder="Prev. Nationality:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
              <div class="col-md-6 form-group">
              <input type="text" name="father_birth_country" class="form-control" id="birth_place" placeholder="Place/Country of Birth:" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
            
              <div class="col-md-6 form-group">
              <input type="number" name="mobile" class="form-control" id="birth_place" placeholder="Phone or Mobile :" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            
           <div class="col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div> 
             
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Other Information"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. We will touch with you soon . Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->



@endsection