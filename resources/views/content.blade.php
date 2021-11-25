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
                <h3>Chào mừng quay trở lại!</h3>
            </div>
        </div>
        <div class="container" id="course">
            <div class="box-container">
                <a href="{{URL::to('/course')}}">
                    <div class="box">
                        <img src="{{URL('front-end/images/lesson-img.png')}}" alt="">
                        <p>Lớp PHP_12014</p>
                        <h4>Lập trình PHP cơ bản</h4>
                    </div>
                </a>
                <div class="box">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                        natus voluptates.</p>
                </div>
                <div class="box">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                        natus voluptates.</p>
                </div>
                <div class="box">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                        natus voluptates.</p>
                </div>
                <div class="box">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                        natus voluptates.</p>
                </div>
                <div class="box">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                        natus voluptates.</p>
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
