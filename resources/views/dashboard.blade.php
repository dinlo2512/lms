@extends('my')
@section('content')
    <div class="content-top">
        <h3>Chào mừng trở lại!</h3>
        <p>Dashboard / My Courses</p>
    </div>
    <div class="container" id="course">
        <div class="box-container">
            <a href="{{URL::to('/course')}}">
                <div class="box">
                    <img src="{{URL('front-end/images/lesson-img.png')}}" alt="">
                    <p>Lớp PHP_12014</p>
                    <h4>Lập trình PHP cơ bản</h4>
                </div>
            </a>
            <div class="box">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                    natus voluptates.</p>
            </div>
            <div class="box">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                    natus voluptates.</p>
            </div>
            <div class="box">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                    natus voluptates.</p>
            </div>
            <div class="box">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                    natus voluptates.</p>
            </div>
            <div class="box">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam at eligendi eveniet facilis, in
                    natus voluptates.</p>
            </div>
        </div>
    </div>
@endsection
