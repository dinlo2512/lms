@extends('my')
@section('content')
    <div class="content-top">
        <h3>Chào mừng trở lại!</h3>
        <p>Dashboard / My Courses</p>
    </div>
        <div class="container" id="course">
            <div class="box-container">
                @foreach($user->courses  as $course)
                <a href="{{ route('my.course', $course->id) }}">
                    <div class="box">
                        <img src="{{URL('front-end/images/lesson-img.png')}}" alt="">
                        <p>{{ $course->name }}</p>
                        <h4>{{ $course->subject }}</h4>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
@endsection
