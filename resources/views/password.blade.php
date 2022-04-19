@extends('my')
@section('content')
    <div class="content-top">
        <h3>Setting Profile</h3>
        <p>Setting</p>
    </div>
    <div class="content">
            <div class="main">
                <div class="row">
                    <div class="col-md-4 mt-1 setting-menu">
                        <a href="{{ route('my.setting-profile') }}"><i class="far fa-user"></i><h5>Quản lý tài khoản</h5></a>
                        <hr>
                        <a href=""><i class="fas fa-lock"></i><h5>Đổi mật khẩu</h5></a>
                        <hr>
                    </div>
                    <div class="col-md-8 mt-1">
                        @if($message = Session::get('error'))
                            <script>
                                Swal.fire({
                                    title: '{{ $message }}',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                })
                            </script>
                        @endif
                        @if($message = Session::get('success'))
                                <script>
                                    Swal.fire({
                                        title: '{{ $message }}',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    })
                                </script>
                        @endif
                        <form action="{{ route('my.setting-password.update', Auth::user()->id) }}" method="post">
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
                                        <input type="password" class="form-control" name="old_password">
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
                                        <input type="password" class="form-control" name="new_password">
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
                                        <input type="password" class="form-control" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Lưu mật khẩu" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
    </div>

@endsection

