
<!-- NAVBAR -->
<nav id="navbar-example2" class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3" href="/public">
            <img src="{{asset('assets/front/img/logo.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3">
            <li class="nav-item"><a class="nav-link" href="/public">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about">About Guruji</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Samuhika Dhyanam</a></li>
                <li class="nav-item"><a class="nav-link" href="dhyasa">Dhyasa</a></li>
                <li class="nav-item"><a class="nav-link" href="#scrollspyHeading2">Schedule</a></li>
                <li class="nav-item"><a class="nav-link" href="#scrollspyHeading4">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#scrollspyHeading3">Links</a></li>
                <li class="nav-item"><a class="nav-link" href="guruji-kshetrams">Guruji's Kshetrams</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><img src="{{asset('assets/front/img/language.png')}}"> English</a></li>
            </ul>
            @if (!Auth::check())
            <div class="d-flex gap-3 mr-t">
                <a class="btn-primary" data-bs-toggle="modal" href="#SignUp" role="button"><img src="{{asset('assets/front/img/avatar-white.png')}}"> Register Now</a>
            </div>
            @else
            <div class="d-flex gap-3 mr-t">
                <a class="btn-primary" href="{{route('custom_logout')}}" role="button"><img src="{{asset('assets/front/img/logout.png')}}"> Logout</a>
            </div>
            @endif
        </div>
    </div>
</nav>
