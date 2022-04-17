
@extends('teacher::layouts.home')

@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="{{route('teacher.courses.index')}}">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Dashboard</span>
            </a>

        </li>
        <li>
            <a href="{{route('teacher.courses.show', $course->id)}}">
                <i class="fas fa-user"></i>
                <span class="links_name">Student</span>
            </a>

        </li>
        <li>
            <a href="{{route('teacher.lessons.index', $course->id)}}">
                <i class="fas fa-home"></i>
                <span class="links_name">Learning</span>
            </a>

        </li>
        <li>
            <a href="{{route('teacher.announcements.index',$course->id)}}" class="actived">
                <i class="fas fa-bullhorn"></i>
                <span class="links_name">Announcements</span>
            </a>

        </li>
        <li>
            <a href="{{route('teacher.showTeacher')}}">
                <i class="fas fa-cog"></i>
                <span class="links_name">Setting</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.statistic.index', $course->id) }}">
                <i class="fas fa-calendar"></i>
                <span class="links_name">Statistic</span>
            </a>

        </li>
    </ul>
@endsection
@section('content')

    <div class="content-top">
        <h3>Lessons</h3>
        <p>Dashboard/{{$course->name}}/Announcements</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1"><u>Tất cả thông báo của lớp</u></h1>
            @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <a href="{{route('teacher.announcements.create', $course->id)}}" class="btn btn-primary">Tạo Thông báo</a>
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <tr class="table-secondary">
                        <th width="5%">STT</th>
                        <th>Nội dung</th>
                        <th>Tiêu đề</th>
                        <th width="10%">Ngày tạo</th>
                        <th></th>
                    </tr>
                    @foreach($announcements as $announcement)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $announcement->content }}</td>
                        <td>{{ $announcement->title }}</td>
                        <td>{{ date('d/m/Y',strtotime($announcement->created_at)) }}</td>
                        <td>
                            <a href="{{ route('teacher.announcements.delete', [$course->id, $announcement->id]) }}"
                               class="btn btn-danger" onclick="return confirm('Xóa thông báo này?')">
                                Xóa
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{ $announcements->links('teacher::paginate.my_paginate') }}
        </div>
    </div>



@endsection
