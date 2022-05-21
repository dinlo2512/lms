@extends('teacher::layouts.home')

@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="{{ route('teacher.admin.allCourse') }}">
                <i class="fas fa-th-large "></i>
                <span class="links_name">Dashboard</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.admin.allSubject') }}">
                <i class="fas fa-chalkboard"></i>
                <span class="links_name">Subject</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.admin.allUser') }}">
                <i class="fas fa-user"></i>
                <span class="links_name">User</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.admin.allTeacher') }}">
                <i class="fas fa-graduation-cap"></i>
                <span class="links_name">Teacher</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.admin.allNotification') }}">
                <i class="fas fa-bell"></i>
                <span class="links_name">Notifications</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.admin.roles') }}">
                <i class="fas fa-dice-d6"></i>
                <span class="links_name">Roles</span>
            </a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="content-top">
        <h3>Welcome </h3>
        <p>Dashboard</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1">Hello World , Welcome Teacher Admin {{ Auth::guard('teacher')->user()->name }}</h1>
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

        .card {
            margin: 8px;
        }

        #welcome-logo {
            height: 250px
        }


    </style>
@endsection
