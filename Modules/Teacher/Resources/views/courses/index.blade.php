@extends('teacher::layouts.home')

@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="{{route('teacher.courses.index')}}" class="{{ request()->path() ? "actived" : "" }}">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Dashboard</span>
            </a>

        </li>
        <li>
            <a href="{{route('teacher.showTeacher')}}">
                <i class="fas fa-cog"></i>
                <span class="links_name">Setting</span>
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
            <h1 class="h1">Hello World</h1>

            <p style="padding-left: 10px">
                This view is loaded from module: {!! config('teacher.name') !!}
            </p>
            @include('teacher::components.courses-list')
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
