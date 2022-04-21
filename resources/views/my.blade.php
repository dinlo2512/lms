<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{URL('front-end/css/normalize.css')}}">
    {{--    <link rel="stylesheet" href="{{URL('front-end/css/fontawesome-5.web/css/all.min.css')}}">--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{URL('front-end/css/home_style.css')}}">
    <link rel="stylesheet" href="{{URL('front-end/css/user_profile.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="sidebar">
    <div class="logo-content">
        <div class="logo">
            <img src="{{URL('/front-end/images/logo.png')}}" alt="">
        </div>
        <i class="fas fa-bars" id="btn"></i>
        <ul class="nav-list">
            <li>
                <a href="{{ route('sitehome') }}" class="{{ 'site-home' == request()->path(route('sitehome')) ? "actived" : "" }}">
                    <i class="fas fa-home"></i>
                    <span class="links_name">Site Home</span>
                </a>
                {{--                <span class="tooltip">Site Home</span>--}}
            </li>
            <li>
                <a href="{{ route('my.profile') }}" class="{{ 'my/user-profile' == request()->path(route('my.profile')) ? "actived" : "" }}">
                    <i class="fas fa-user"></i>
                    <span class="links_name">User</span>
                </a>
                {{--                <span class="tooltip">User</span>--}}
            </li>
            <li>
                <a href="{{route('my.dashboard')}}" class="{{'my' == request()->path(route('my.dashboard')) ? "actived" : "" }}
                    ">
                    <i class="fas fa-th-large"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                {{--                <span class="tooltip">Dashboard</span>--}}
            </li>
            <li>
                <a href="{{ route('my.setting-profile') }}" class="{{ 'my/setting-profile' == request()->path(route('my.setting-profile')) ? "actived" : "" }}
                {{'my/setting-password' == request()->path(route('my.setting-password')) ? "actived" : "" }}
                    ">
                    <i class="fas fa-cog"></i>
                    <span class="links_name">Setting</span>
                </a>
                {{--                <span class="tooltip">Setting</span>--}}
            </li>
        </ul>
    </div>
</div>
<div class="home-content">
    <div class="header">
        <div class="header-top">
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-detail">
                        <img src="
                        @if(isset(Auth::user()->avatar))
                        {{ asset('storage/user/avatar/'.Auth::user()->avatar) }}
                        @else
                        {{ URL('/front-end/images/user.jfif') }}
                        @endif " alt="">
                        <div class="name-job">
                            <div class="name">{{ Auth::user()->name }}</div>
                            <div class="job">Student</div>
                        </div>
                    </div>
                    <div class="drop">
                        <i class="fas fa-caret-down" id="dropdown"></i>
                        <div class="drop-menu">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                <div class="name">LOG OUT</div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <div id="footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="logo-footer col-md-4">
                        <img src="{{URL('front-end/images/logo2.png')}}" alt="">
                    </div>
                    <div class="contact-us col-md-4">
                        <h3>contact us</h3>
                        <p><i class="fas fa-phone-square-alt"></i> Phone: +0389736466</p>
                        <p><i class="fas fa-envelope"></i> Email:dinhlong251200@gmail.com</p>
                    </div>
                    <div class="icon col-md-4">
                        <h3>get social</h3>
                        <img src="{{URL('front-end/images/facebook-logo.png')}}" alt="">
                        <img src="{{URL('front-end/images/ins-logo.png')}}" alt="">

                        <img src="{{URL('front-end/images/twitter-logo.png')}}" alt="">
                        <img src="{{URL('front-end/images/google-plus.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <h1>&copy; copyright @ 2021 by <span>DINLO</span></h1>

    </div>
</div>


<script>
    $(document).ready(function () {

        $('.fa-bars').click(function () {
            $('.sidebar').toggleClass('active');
        })

    });
    $(document).ready(function () {

        $('.fa-caret-down').click(function () {
            $('.drop').toggleClass('active');
        })

    });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>

@yield('script')
</body>
</html>
