@extends('common.master')
@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2 data-aos="fade-up">Gurdwara Dashboard</h2>
            <!-- <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit.  -->
            </p>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-xl-12 col-lg-12 mt-4" id="selfRegisterDiv">
            <form method="POST" enctype='multipart/form-data' role="form" id="regmyform" class="php-email-form">
                <!-- {{Session::get('gurudwara')[0]['id']}} -->
                <input type="hidden" name="id" id="id" value="{{Session::get('gurudwara')[0]['id']}}"/>
                <div class="form-row">
                    <div class="col-md-12 form-group">
                        <label>Gurdwara Logo</label>
                        <img src="img_girl.jpg" alt="Girl in a jacket" class="form-control">

                        <!-- <input type="file" required class="form-control" style="" name="logo" id="logo" accept="image/png, image/gif, image/jpeg" /> -->
                        <div class="validate"></div>
                    </div>


                    <!-- <div class="col-md-12 form-group">
                        <label>Upload Letter Head</label>
                        <input type="file" required name="letter_head" class="form-control" id="letter_head" accept="image/png, image/gif, image/jpeg" />
                        <div class="validate"></div>
                    </div> -->
                  
                    
              
                </div>
              <!-- <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. We will touch with you soon . Thank you!</div>
              </div> -->
                <!-- <div class="text-center"><button type="submit" name="submit" id="submit">Send Message</button></div> -->
            </form>
          </div>

        

        </div>
    </div>
</section>
<!-- End Contact Section -->


@endsection