<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="{{URL('front-end/css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL('front-end/css/fontawesome-5.web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{URL('front-end/css/home_style.css')}}">
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
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    <span class="links_name">User</span>
                </a>
                <span class="tooltip">User</span>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    <span class="links_name">Site Home</span>
                </a>
                <span class="tooltip">Site Home</span>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class="tooltip">Setting</span>
            </li>
        </ul>
        <div class="profile-content">
            <div class="profile">
                <div class="profile-detail">
                    <img src="{{URL('front-end/images/user.jfif')}}" alt="">
                    <div class="name-job">
                        <div class="name">NAME</div>
                        <div class="job">Student</div>
                    </div>
                </div>
                <i class="fas fa-sign-out-alt" id="log-out"></i>
            </div>
        </div>
    </div>
</div>
@yield('content')



<script>
    $(document).ready(function () {

        $('.fa-bars').click(function () {
            $('.sidebar').toggleClass('active');
        })

    });
</script>
</body>
</html>
