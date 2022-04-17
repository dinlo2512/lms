@extends('teacher::layouts.home')
@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="{{ route('teacher.courses.index') }}">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Dashboard</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.showTeacher') }}" class="actived">
                <i class="fas fa-cog"></i>
                <span class="links_name">Setting</span>
            </a>
        </li>
@endsection


@section('content')
            <div class="content-top">
                <h3>Setting Profile</h3>
                <p>Setting</p>
            </div>
            <div class="content">
                <form action="{{ route('teacher.setting.account', Auth::guard('teacher')->user()->id) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="main">
                        <div class="row">
                            <div class="col-md-4 mt-1 setting-menu">
                                <a href=""><i class="far fa-user"></i><h5>Quản lý tài khoản</h5></a>
                                <hr>
                                <a href="{{ route('teacher.setting.editpassword') }}"><i class="fas fa-lock"></i><h5>Đổi mật khẩu</h5></a>
                                <hr>
                            </div>
                            <div class="col-md-8 mt-1">
                                @if($message = Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ $message }}
                                    </div>
                                @endif
                                <div class="card text-center">
                                    <div class="card-body">
                                        <div class="wapper">
                                            <img src="
                                            @if(isset(Auth::guard('teacher')->user()->avatar))
                                            {{ asset('storage/admin/avatar/'.Auth::guard('teacher')->user()->avatar) }}
                                            @else
                                            {{ URL('/front-end/images/user.jfif') }}
                                            @endif " alt="">
                                            <input class="img-file" type="file" name="avatar">
                                        </div>
                                        <div class="mt-3">
                                            <h3>{{Auth::guard('teacher')->user()->name}}</h3>
                                            <p>Teacher</p>
                                        </div>
                                        @error('avatar')
                                        @foreach($errors->get('avatar') as $error)
                                            <p class="error">{{$error}}</p>
                                        @endforeach
                                        @enderror
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
                                                <input class="pointer form-control" type="text" readonly
                                                       value="{{Auth::guard('teacher')->user()->username }}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5>Email: </h5>
                                            </div>
                                            <div class="col-md-9 text-secondary">
                                                <input class="pointer form-control" type="text" readonly
                                                       value="{{Auth::guard('teacher')->user()->email}}">
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
                                                @error('name')
                                                @foreach($errors->get('name') as $error)
                                                    <p class="error">{{$error}}</p>
                                                @endforeach
                                                @enderror
                                                <input class="form-control" name="name" type="text"
                                                       value="{{Auth::guard('teacher')->user()->name}}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5>Ngày sinh: </h5>
                                            </div>
                                            <div class="col-md-9 text-secondary">
                                                @error('date_of_birth')
                                                @foreach($errors->get('date_of_birth') as $error)
                                                    <p class="error">{{$error}}</p>
                                                @endforeach
                                                @enderror
                                                <input class="form-control" name="date_of_birth" type="text"
                                                       value="{{Auth::guard('teacher')->user()->date_of_birth}}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5>Điện thoại: </h5>
                                            </div>
                                            <div class="col-md-9 text-secondary">
                                                @error('phone_number')
                                                @foreach($errors->get('phone_number') as $error)
                                                    <p class="error">{{$error}}</p>
                                                @endforeach
                                                @enderror
                                                <input class="form-control" name="phone_number" type="text"
                                                       value="{{Auth::guard('teacher')->user()->phone_number}}">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5>Địa chỉ: </h5>
                                            </div>
                                            <div class="col-md-9 text-secondary">
                                                @error('address')
                                                @foreach($errors->get('address') as $error)
                                                    <p class="error">{{$error}}</p>
                                                @endforeach
                                                @enderror
                                                <input class="form-control" name="address" type="text"
                                                       value="{{Auth::guard('teacher')->user()->address}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Lưu thông tin" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

@endsection

