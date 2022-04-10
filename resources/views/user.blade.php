@extends('my')
@section('content')
    <div class="content-top">
        <h3>User Profile</h3>
        <p>Dashboard / User</p>
    </div>
        <div class="content">
            <div class="main">
                <div class="row">
                    <div class="col-md-4 mt-1">
                        <div class="card text-center">
                            <div class="card-body">
                                <img src="{{URL('front-end/images/user.jfif')}}" alt="" class="rounded-circle" width="150px">
                                <div class="mt-3">
                                    <h3>{{ Auth::user()->name }}</h3>
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
                                        {{ Auth::user()->name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Email: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                       {{ Auth::user()->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Điện thoại: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        {{ Auth::user()->phone_number }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Địa chỉ: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        {{ Auth::user()->address }}
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

@endsection
