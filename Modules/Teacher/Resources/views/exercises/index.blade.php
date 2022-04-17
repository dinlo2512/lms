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
            <a href="{{route('teacher.lessons.index', $course->id)}}" class="actived">
                <i class="fas fa-home"></i>
                <span class="links_name">Learning</span>
            </a>

        </li>
        <li>
            <a href="{{route('teacher.announcements.index',$course->id)}}">
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
        <h3>Exercises</h3>
        <p>Dashboard/{{$course->name}}/Lessons/Exercises</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1"><u> Bài học: {{ $lesson->content }} </u></h1>
            @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <a href="{{route('teacher.exercises.create', [$course->id,$lesson->id])}}" class="btn btn-primary">Thêm bài
                tập</a>
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <tr class="table-secondary">
                        <th>STT</th>
                        <th>Tên bài tập</th>
                        <th>Ngày nộp</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($exercises as $exercise)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $exercise->content }}</td>
                            <td>{{ date('d/m/Y', strtotime($exercise->deadline)) }}</td>
                            <td><a href="{{ route('teacher.grades.index', [$course->id,$lesson->id,$exercise->id]) }}"
                                   class="btn btn-info">
                                    Điểm
                                </a>
                            </td>
                            <td>
                                @if($exercise->status == 1 )
                                    <a href="#" class="btn btn-success">
                                        Bài tập đã giao
                                    </a>
                                @elseif($exercise->status != 1)
                                    <a href="{{ route('teacher.exercises.give', [$course->id,$lesson->id,$exercise->id]) }}"
                                       class="btn btn-danger">
                                        Giao bài tập
                                    </a>
                                @endif
                            </td>
                            <td><a href="{{ route('teacher.exercises.edit', [$course->id,$lesson->id,$exercise->id]) }}"
                                   class="btn btn-warning">
                                    Sửa
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('teacher.exercises.delete', [$course->id,$lesson->id,$exercise->id]) }}"
                                   class="btn btn-outline-danger" onclick="return confirm('Xóa bài tập này?')">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{ $exercises->links('teacher::paginate.my_paginate') }}
        </div>
    </div>



@endsection
