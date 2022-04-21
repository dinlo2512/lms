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
            @foreach($notifications as $noti)
                <p>{{ $noti->title }}</p>
            <h5 style="padding-left: 30px">&#9658; {{ $noti->content }}</h5>
            @endforeach
        </div>
        <div style="margin-top:5px" class="text-lg-start card-body">
            <h3 class="text-info"> &rArr; Thông báo lớp:</h3>
            @foreach($courses as $course)
                @php
                $announcements = \App\Models\Announcement::query()->where('course_id',$course->course_id)
                ->orderByDesc('created_at')
                ->get();
                @endphp
            @foreach($announcements as $value)
                <p>{{ $value->title }}</p>
            <h5 style="padding-left: 30px">&#9658; {{ $value->content }}</h5>
            @endforeach
            @endforeach
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
