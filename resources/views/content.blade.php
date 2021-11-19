@extends('home')
@section('content')
    <div class="home-content">
        <div class="header">
            <div class="header-top"></div>
            <div class="heading">
                <h3>Chào mừng quay trở lại!</h3>
            </div>
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

    </div>
@endsection
