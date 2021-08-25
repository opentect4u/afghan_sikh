@if(isset(Session::get('gurudwara')[0]['user_type']))
<header id="header">
  <div class="container d-flex">
    <div class="logo mr-auto">
      <h1 class="text-light"><a href="{{route('gurudwara.home')}}"><span>Afghan Sikh Helps Line</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Services</a></li>
        <li><a href="">Contact</a></li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header>
@else
<header id="header">
  <div class="container d-flex">
    <div class="logo mr-auto">
      <h1 class="text-light"><a href="{{route('index')}}"><span>Afghan Sikh Helps Line</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="{{route('index')}}">Home</a></li>
        <li><a href="{{route('index')}}#about">About</a></li>
        <li><a href="{{route('index')}}#services">Services</a></li>
        <li><a href="{{route('index')}}#contact">Contact</a></li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header>
@endif