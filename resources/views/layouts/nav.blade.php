<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>FlexStart</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active " href="{{route('home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('about')}}">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team"></a></li>
          <li><a href="{{route('blog')}}">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{route('contact')}}">Связаться с нами</a></li>
          <li><a class="nav-link scrollto" href="{{route('register')}}">Регистрация</a></li>
          <li><a class="nav-link scrollto" href="{{route('login')}}">Вход</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->