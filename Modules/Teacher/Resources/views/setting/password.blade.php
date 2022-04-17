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
                <div class="main">
                    <div class="row">
                        <div class="col-md-4 mt-1 setting-menu">
                            <a href="{{ route('teacher.showTeacher') }}"><i class="far fa-user"></i><h5>Quản lý tài
                                    khoản</h5></a>
                            <hr>
                            <a href=""><i class="fas fa-lock"></i><h5>Đổi mật khẩu</h5></a>
                            <hr>
                        </div>
                        <div class="col-md-8 mt-1 form-group form">
                            @if($message = Session::get('error'))
                                <div class="alert alert-danger" role="alert">
                                   {{ $message }}
                                </div>
                            @endif
                                @if($message = Session::get('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ $message }}
                                    </div>
                                @endif
                            <form action="{{ route('teacher.setting.password',Auth::guard('teacher')->user()->id) }}"
                                  method="post">
                                @csrf
                                <div class="card mb-3 ">
                                    <h1 class="m-3 pt-3">Đổi mật khẩu</h1>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5>Mật khẩu hiện tại: </h5>
                                            </div>
                                            <div class="col-md-9 text-secondary">
                                                @error('old_password')
                                                @foreach($errors->get('old_password') as $error)
                                                    <p class="error">{{$error}}</p>
                                                @endforeach
                                                @enderror
                                                <input class="form-control" type="password" name="old_password"
                                                       >
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5>Mật khẩu mới: </h5>
                                            </div>
                                            <div class="col-md-9 text-secondary">
                                                @error('new_password')
                                                @foreach($errors->get('new_password') as $error)
                                                    <p class="error">{{$error}}</p>
                                                @endforeach
                                                @enderror
                                                <input class="form-control" type="password" name="new_password"
                                                      >
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5>Xác nhận mật khẩu: </h5>
                                            </div>
                                            <div class="col-md-9 text-secondary">
                                                @error('confirm_password')
                                                @foreach($errors->get('confirm_password') as $error)
                                                    <p class="error">{{$error}}</p>
                                                @endforeach
                                                @enderror
                                                <input class="form-control" type="password" name="confirm_password"
                                                      >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" name="submit"> Lưu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection

