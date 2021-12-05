@extends('my')
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
                        <a href="{{URL::to('/setting-user-profile')}}"><i class="far fa-user"></i><h5>Quản lý tài khoản</h5></a>
                        <hr>
                        <a href="{{URL::to('/password-user-profile')}}"><i class="fas fa-lock"></i><h5>Đổi mật khẩu</h5></a>
                        <hr>
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card mb-3 ">
                            <h1 class="m-3 pt-3">Đổi mật khẩu</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Mật khẩu hiện tại: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <input type="password">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Mật khẩu mới: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <input type="password">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Xác nhận mật khẩu: </h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        <input type="password" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Lưu">
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

