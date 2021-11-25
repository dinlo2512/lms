@extends('my')
@section('content')
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
                                    <div class="name">LOG OUT</div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="heading">
                <h3>Tên course</h3>
                <p>Dashboard / My Courses / Tên course</p>
            </div>
        </div>
        <div class="content">
            <div class="main">
                <div class="lesson">
                    <p>chương 1:</p>
                </div>
                <div class="lesson">
                    <p>chương 2:</p>
                </div>
                <div class="lesson">
                    <p>chương 3:</p>
                </div>
                <div class="lesson">
                    <p>chương 4:</p>
                </div>
            </div>
        </div>
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
@endsection
