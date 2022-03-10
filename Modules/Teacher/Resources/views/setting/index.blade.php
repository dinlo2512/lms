@extends('teacher::layouts.home')
@section('nav-list')

@endsection


@section('content')
    <div class="content-top">
        <h3>Setting Profile</h3>
        <p>Setting</p>
    </div>
    <div class="content">
        <form action="" method="" enctype="multipart/form-data">
            <div class="main">
                <div class="row">
                    <div class="col-md-4 mt-1 setting-menu">
                        <a href=""><i class="far fa-user"></i><h5>Quản lý tài khoản</h5></a>
                        <hr>
                        <a href=""><i class="fas fa-lock"></i><h5>Đổi mật khẩu</h5></a>
                        <hr>
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="wapper">
                                    <input class="img-file" type="file">
                                </div>
                                <div class="mt-3">
                                    <h3>{{Auth::guard('teacher')->user()->name}}</h3>
                                    <p>Teacher</p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 ">
                            <h1 class="m-3 pt-3">Thông tin tài khoản</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>User Name: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <input class="pointer" type="text" readonly value="{{Auth::guard('teacher')->user()->username }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Email: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <input class="pointer" type="text" readonly value="{{Auth::guard('teacher')->user()->email}}">
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="card mb-3 ">
                            <h1 class="m-3 pt-3">Thông tin cá nhân</h1>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Họ và tên: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <input type="text" value="{{Auth::guard('teacher')->user()->name}}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Điện thoại: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <input type="text" value="{{Auth::guard('teacher')->user()->phone_number}}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Địa chỉ: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <input type="text" value="{{Auth::guard('teacher')->user()->address}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Lưu" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

