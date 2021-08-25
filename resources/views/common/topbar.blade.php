
@if(isset(Session::get('gurudwara')[0]['user_type']))
<section id="topbar" class="d-none d-lg-block">
  <div class="container d-flex">
    <div class="contact-info mr-auto">
      <ul>
        <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">support@sikhhelps.com</a></li>
        <li><i class="icofont-phone"></i> +1 5589 55488 55</li>
      </ul> 
    </div>
    <div class="cta">
      <a href="{{route('gurudwara.logout')}}" class="scrollto">Logout</a>
      <!-- <a href="{{route('user.register')}}" class="scrollto">Get Started</a> -->
    </div>
  </div>
</section>
@else

<!-- chitta -->
<section id="topbar" class="d-none d-lg-block">
  <div class="container d-flex">
    <div class="contact-info mr-auto">
      <ul>
        <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">support@sikhhelps.com</a></li>
        <li><i class="icofont-phone"></i> +1 5589 55488 55</li>
      </ul> 
    </div>
    <div class="cta">
      <a href="{{route('gurudwara.login')}}" class="scrollto">Gurdwara Login</a>
      <a href="{{route('user.register')}}" class="scrollto">Get Started</a>
    </div>
  </div>
</section>
@endif
