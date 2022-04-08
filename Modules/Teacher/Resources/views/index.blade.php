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
            <a href="{{ route('teacher.showTeacher') }}">
                <i class="fas fa-cog"></i>
                <span class="links_name">Setting</span>
            </a>
        </li>
@endsection


@section('content')
    <div class="content-top">
        <h3>Welcome </h3>
        <p>Dashboard</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1">Hello World , Welcome Teacher {{ Auth::guard('teacher')->user()->name }}</h1>
            <br><br><br>
            <div class="text-center">
            <img id="welcome-logo" src="{{URL('/front-end/images/logo.png')}}" alt="LNL Logo">
            </div>
        </div>
    </div>
    <style>
        table {
            margin: 30px 8px;
        }
        .card{
            margin: 8px;
        }
        #welcome-logo{
            height:250px
        }
    </style>
@endsection
