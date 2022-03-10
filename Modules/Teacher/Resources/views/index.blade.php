@extends('teacher::layouts.home')

@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Dashboard</span>
            </a>

        </li>
        <li>
            <a href="#">
                <i class="fas fa-user"></i>
                <span class="links_name">Student</span>
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
            <h1>Hello World</h1>

            <p>
                This view is loaded from module: {!! config('teacher.name') !!}
            </p>
        </div>
    </div>
    <style>
        table {
            margin: 30px 8px;
        }
        .card{
            margin: 8px;
        }
    </style>
@endsection
