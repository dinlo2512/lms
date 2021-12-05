<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="{{URL('front-end/css/normalize.css')}}">
    {{--    <link rel="stylesheet" href="{{URL('front-end/css/fontawesome-5.web/css/all.min.css')}}">--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{URL('front-end/css/home_style.css')}}">
    <link rel="stylesheet" href="{{URL('front-end/css/user_profile.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <a href="#">
                    <i class="fas fa-th-large"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                {{--                <span class="tooltip">Dashboard</span>--}}
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    <span class="links_name">User</span>
                </a>
                {{--                <span class="tooltip">User</span>--}}
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    <span class="links_name">Site Home</span>
                </a>
                {{--                <span class="tooltip">Site Home</span>--}}
            </li>
            <li>
                <a href="#">
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
                        <img src="{{URL('front-end/images/user.jfif')}}" alt="">
                        <div class="name-job">
                            <div class="name">NAME NAME</div>
                            <div class="job">Student</div>
                        </div>
                    </div>
                    <div class="drop">
                        <i class="fas fa-caret-down" id="dropdown"></i>
                        <div class="drop-menu">
                            <a href=""><i class="fas fa-sign-out-alt"></i>
                                <div class="name">LOG OUT</div>
                            </a>
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
                        <p><i class="fas fa-phone-square-alt"></i> Phone: +999999999</p>
                        <p><i class="fas fa-envelope"></i> Email:aaaa@gmail.com</p>
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
</body>
</html>
