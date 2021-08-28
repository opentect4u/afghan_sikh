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
                <h3 data-aos="fade-up">Afghan Sikh Helps Line</h3>
                <p data-aos="fade-up" style="text-align: justify;">
                Afghan Sikh help Line organisations a UK based non-profit organization, we are registering all migrant Afghan Sikh and Hindu families who is moved around the world and our mission is to provide then better life, So we are offer an online portal to register their self and make an unity.
    Our Organization starts making the Unity of the Sikh and Hindu community since its foundation in 2020. Now we want to reach all over the world to support the Afghan migrant Sikhs and Hindu families.<br>
    During the political issues all afghan Sikh & Hindu are separated from their families. They are suffering with many personal and government issues.
    The aim of Afghan Sikh Help Line organisation is to support the Afghan Sikh & Hindu Community all over world placing in under one umbrella and to reunited the all families who are suffering from political issues and provide them and their children and better future over coming days & Years.</p>
    </div>
            </div>

        </div>
        </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>I need to prepare politics in new categories</h2>
          <p>Arrange one portal in emergency I need to start before registrations in different way just trying</p>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i><img src="{{ asset('public/img/1.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Finance</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores</p>
			  <div class="btn-wrap">
                <a href="{{route('user.servicesregister')}}?purpose=FINANCE" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i><img src="{{ asset('public/img/2.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Family disputes</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores</p>
			  <div class="btn-wrap">
                <a href="{{route('user.servicesregister')}}?purpose=FAMILY DISPUTES" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i><img src="{{ asset('public/img/3.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Marriages issues</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate</p>
			  <div class="btn-wrap">
                <a href="{{route('user.servicesregister')}}?purpose=MARRIAGES ISSUES" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
             <div class="icon"><i><img src="{{ asset('public/img/4.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Religious issue </a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt</p>
			  <div class="btn-wrap">
                <a href="{{route('user.servicesregister')}}?purpose=RELIGIOUS ISSUE" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
             <div class="icon"><i><img src="{{ asset('public/img/5.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Reunion Family</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos</p>
			  <div class="btn-wrap">
                <a href="{{route('user.servicesregister')}}?purpose=REUNION FAMILY" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
             <div class="icon"><i><img src="{{ asset('public/img/6.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Property dispute</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita</p>
			  <div class="btn-wrap">
                <a href="{{route('user.servicesregister')}}?purpose=PROPERTY DISPUTE" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
		   <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i><img src="{{ asset('public/img/7.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Divorce dispute</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita</p>
			  <div class="btn-wrap">
                <a href="{{route('user.servicesregister')}}?purpose=DIVORCE DISPUTE" class="btn-buy">Get Support</a>
              </div>
            </div>
          </div>
		   <div class="col-lg-3 col-md-3" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
          <div class="icon"><i><img src="{{ asset('public/img/8.png') }}" alt=""></i></div>
              <h4 class="title"><a href="">Other</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita</p>
			  <div class="btn-wrap">
                <a href="{{route('user.servicesregister')}}?purpose=OTHER " class="btn-buy">Get Support</a>
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
            <img src="{{ asset('public/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ asset('public/img/testimonials/testimonials-2.jpg') }}" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ asset('public/img/testimonials/testimonials-3.jpg') }}" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ asset('public/img/testimonials/testimonials-4.jpg') }}" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

          <div class="testimonial-item">
            <img src="{{ asset('public/img/testimonials/testimonials-5.jpg') }}" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>

        </div>

      </div>
    </section><!-- End Testimonials Section -->


   
  <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2 data-aos="fade-up">Contact</h2>
          <p data-aos="fade-up">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row justify-content-center">

          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>info@example.com<br>contact@example.com</p>
            </div>
          </div>
          <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
            <div class="info-box">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
            </div>
          </div>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-xl-9 col-lg-12 mt-4">
            <form action="{{route('contact')}}" method="post" role="form" class="php-email-form">
              @csrf
              <!-- <div class="form-row">
                <div class="col-md-12 form-group">
                  <div style="" align="center">Thanks for contact with us</div>
                </div>
              </div> -->

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
                <input type="text" class="form-control" name="message" id="message" placeholder="Message" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <!-- <textarea class="form-control" required name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea> -->
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  <!-- </main> -->
  <!-- End #main -->

@endsection