<header id="zr-theme-menu" class="zr-theme-menu-header-navber-area">
    <div class="nav-top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <ul class="top-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="call-to-action">
                        <p><i class="fa fa-map"></i> Séguela, Côte d'Ivoire</p>
                        <p><i class="fa fa-phone"></i> Phone: +1 1234 56 780</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-b navbar-trans navbar-expand-lg" id="mainNav">
        <div class="container menu-bg border-4">
            <a class="navbar-brand js-scroll" href="{{ route('welcome') }}">
                <img src="{{ asset('images/logo.png') }}" class="white-logo" alt="LOGO">
                <img src="{{ asset('images/logo-black.png') }}" class="black-logo" alt="LOGO">
            </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation"> <span></span>  <span></span>  <span></span> 
        </button>
            <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll active" href="index.html">@lang('locale.home')</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll" href="services.html">@lang('locale.service', ['suffix'=>'s'])</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll" href="doctors.html">@lang('locale.team')</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll" href="timetable.html">@lang('locale.timetable')</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll" href="blogs.html">@lang('locale.blog', ['suffix'=>'s'])</a></li>
                    <li class="nav-item"><a class="theme-button-light js-scroll" href="appointment.html"><i class="fa fa-calendar-check-o"></i> <span></span>@lang('locale.book_appointment')</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll" href="contact.html">@lang('locale.contact')</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>