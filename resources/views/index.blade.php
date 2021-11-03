@extends('common.master')
@section('content')


    <!-- <main id="main"> -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
        <div class="container">

            <div class="row">
            <div class="col-xl-5 col-lg-6" data-aos="fade-right">
            <img src="{{ asset('public/img/about.png') }}" alt="">
            </div>

            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                <h4 data-aos="fade-up">About us</h4>
                <h3 data-aos="fade-up">Afghan Sikh</h3>
                <p align="justify">Afghan Sikh organisation is a registered, United Kingdom based, non-profit organization. Our motto is to provide shelter and support to all persecuted minorities of Afghanistan (migrant Sikh and Hindu families). We have designed an online plate-form for registrations of all those migrant Afghan Sikh and Hindu families who have moved-out from Afghanistan to other countries due to security issues associated with their families.</p>

          <p>Our mission is to provide better life, and arrange maximum support for the Afghan refugees in respective countries; we are also supporting refugees in their personal/family related issues.<br>
Now, it is the time to locate and reach to these Afghan Sikh and Hindu refugees all across the world, and start a channel of communication with governments of their respective nations to draw plans for their assimilation in the civil societies. 
 </p>
      <p>Due to the Taliban coup in Afghanistan, many Afghan Sikhs and Hindus have been separated from their families. They are suffering with many personal and government issues. The aim of Afghan Sikh organisation is to support the Afghan Sikh and Hindu Community all over world placing them under one umbrella and to reunite members of the families who were separated in Afghan crisis; who are suffering from political turmoil in Afghanistan, and political negligence in the nations they are taking refuge at, and provide better future to them and their children in near future.</p>
            </div>
            </div>

        </div>
        </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Registered Members can apply for below mentioned Support Category</h2>
          <p>If you are not registered yet kindly register yourself first and avail the services</p>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i><img src="{{ asset('public/img/1.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Finance</a></h4>
              <p class="description">Any finance related issue and support, you are ask for the support </p>
			  <div class="btn-wrap">
                <a href="{{route('user.login')}}" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i><img src="{{ asset('public/img/2.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Family disputes</a></h4>
              <p class="description">Personal Family Related issue and support, you are ask for the support </p>
			  <div class="btn-wrap">
                <a href="{{route('user.login')}}" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i><img src="{{ asset('public/img/3.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Marriages issues</a></h4>
              <p class="description">Marriage related issue and support , you are ask for the support </p>
			  <div class="btn-wrap">
                <a href="{{route('user.login')}}" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
             <div class="icon"><i><img src="{{ asset('public/img/4.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Religious issue </a></h4>
              <p class="description">Religious related issue and support , you are ask for the support </p>
			  <div class="btn-wrap">
                <a href="{{route('user.login')}}" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
             <div class="icon"><i><img src="{{ asset('public/img/5.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Reunion Family</a></h4>
              <p class="description">If you want to meet your family or relative we can help you to connect. </p>
			  <div class="btn-wrap">
                <a href="{{route('user.login')}}" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
             <div class="icon"><i><img src="{{ asset('public/img/6.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Property dispute</a></h4>
              <p class="description">Properity related disputem, we will provide help to resolve the issue. </p>
			  <div class="btn-wrap">
                <a href="{{route('user.login')}}" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
		   <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i><img src="{{ asset('public/img/7.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Divorce dispute</a></h4>
              <p class="description">Divorce related dispute , you are ask for the support </p>
			  <div class="btn-wrap">
                <a href="{{route('user.login')}}" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
		   <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
          <div class="icon"><i><img src="{{ asset('public/img/8.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Other</a></h4>
              <p class="description">If you have any other query please feel free to ask for support </p>
			  <div class="btn-wrap">
                <a href="{{route('user.login')}}" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->



    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="owl-carousel testimonials-carousel">

         
          <div class="testimonial-item">
            <img src="{{ asset('public/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
            <h3>Matt Kaur </h3>
            <h4>Shop Keeper </h4>
            <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>Very supportive team </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ asset('public/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
            <h3>Jhora Singh</h3>
            <h4>Entrepreneur</h4>
            <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>Quick Supprt from Afghan Sikh team. </p>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->


   
  <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Contact</h2>
          <p data-aos="fade-up">We are here for support for needy one, our team will contract you within 48 hours. just submit your detail or you can call on direct phone no </p>
        </div>

        <div class="row justify-content-center">

          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>62 KING STREET, SOUTHALL, MIDDLESEX, UB24DB London(UK) </p>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p><a href="mailto:info@afghansikh.org"> info@afghansikh.org</a><br>
			  <a href="mailto:support@afghansikh.org"> support@afghansikh.org</a>
			  </p>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+44 07955555561  </p>
            </div>
          </div>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-xl-9 col-lg-12 mt-4">
            
            <form name="contactForm" id="contactForm" action="{{route('contact')}}" method="post" role="form" class="php-email-form">
              @csrf
                @if(Session::has('success'))
                <div class="form-row" id="contactMsgDiv">
                  <div class="col-md-12 form-group">
                    <div style="color:green;" align="center">Thanks for contact with us</div>
                  </div>
                </div>
                @endif

              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" required name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" required class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" required name="message" rows="5" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <!-- <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
              <div class="text-center"><button type="submit">Send Message</button>
              <!-- class="g-recaptcha" 
                  data-sitekey="6Lc4sg8dAAAAAEsyE29cdlaYfh5YpVeZKORQnfJF" 
                  data-callback="onClick" data-action="submit" -->
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  <!-- </main> -->
  <!-- End #main -->

@endsection

@section('script')
  <!-- index page script -->
<!-- <script src="https://www.google.com/recaptcha/api.js?render=6Lc4sg8dAAAAAEsyE29cdlaYfh5YpVeZKORQnfJF"></script> -->
<script>
      function onClick(e) {
        // document.getElementById("contactForm").submit();

        // e.preventDefault();
        // grecaptcha.ready(function() {
        //   grecaptcha.execute('6Lc4sg8dAAAAAEsyE29cdlaYfh5YpVeZKORQnfJF', {action: 'submit'}).then(function(token) {
        //       // Add your logic to submit to your backend server here.
        //       alert("hii");
        //       document.getElementById("contactForm").submit();

        //   });
        // });
      }
  </script>
@endsection