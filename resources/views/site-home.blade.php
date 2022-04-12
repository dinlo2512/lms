@extends('my')
@section('content')
    <div class="content-top">
        <h3>Chào mừng trở lại!</h3>
        <p>Site Home</p>
    </div>
    <div class="container" style="height: 2000px">
        <div class="text-center">
            <h1 class="text-danger">HỆ THỐNG QUẢN LÝ NỘI DUNG HỌC TẬP</h1>
            <img class="fade-in" id="welcome-logo" src="{{URL('/front-end/images/logo.png')}}" alt="LNL Logo">
            <br><br>

            <h2 class="text-danger">CÁC THÔNG BÁO MỚI NHẤT</h2>
        </div>
        <div class="text-lg-start card-body">
            <h3 class="text-primary"> &rArr; Thông báo chung:</h3>
            <h5 style="padding-left: 30px">&#9658; abcdefu</h5>
        </div>
        <div style="margin-top:5px" class="text-lg-start card-body">
            <h3 class="text-info"> &rArr; Thông báo lớp:</h3>
            <h5 style="padding-left: 30px">&#9658; abcdefu</h5>
        </div>

    </div>
    <style>
        .fade-in{
            animation: fadeIn 3.5s
        }
        @keyframes fadeIn{
            from{
                opacity: 0;
            }
            to{
                opacity: 1;
            }
        }
    </style>
@endsection()
