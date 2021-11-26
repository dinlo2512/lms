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
                                    <div class="name">LOG OUT</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="heading">
                <h3>User Profile</h3>
                <p>Dashboard / My Courses / User</p>
            </div>
        </div>
        <div class="content">
            <div class="main">
                <div class="row">
                    <div class="col-md-4 mt-1">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{URL('front-end/images/user.jfif')}}" alt="" class="rounded-circle" width="150px">
                                <div class="mt-3">
                                    <h3>NAME NAME</h3>
                                    <p>Student</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card mb-3 ">
                            <h1 class="m-3 pt-3">Thông tin</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Họ và tên: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        Name Name
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Email: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        email@gmail.com
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Điện thoại: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        0123456789
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Địa chỉ: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        Địa chỉ, địa chỉ, địa chỉ
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <h1 class="m-3">Điểm số</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="course">
                                        <h5>Course</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 grade">
                                            <h6>Chương 1: </h6>
                                        </div>
                                        <div class="col-md-4 grade">
                                            <h6>Điểm </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 grade">
                                            <h6>Chương 2: </h6>
                                        </div>
                                        <div class="col-md-4 grade">
                                            <h6>Điểm </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 grade">
                                            <h6>Chương 3: </h6>
                                        </div>
                                        <div class="col-md-4 grade">
                                            <h6>Điểm </h6>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="course">
                                        <h5>Course</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 grade">
                                            <h6>Chương 1: </h6>
                                        </div>
                                        <div class="col-md-4 grade">
                                            <h6>Điểm </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 grade">
                                            <h6>Chương 2: </h6>
                                        </div>
                                        <div class="col-md-4 grade">
                                            <h6>Điểm </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 grade">
                                            <h6>Chương 3: </h6>
                                        </div>
                                        <div class="col-md-4 grade">
                                            <h6>Điểm </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
