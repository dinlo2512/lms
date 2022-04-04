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
            <a href="{{route('teacher.showTeacher')}}">
                <i class="fas fa-cog"></i>
                <span class="links_name">Setting</span>
            </a>

        </li>
    </ul>
@endsection
@section('content')

    <div class="content-top">
        <h3>Lessons</h3>
        <p>Dashboard/{{$course->name}}</p>
    </div>
    <div class="content">
        <div class="main">
            <h1> Tất cả bài học của lớp</h1>
{{--            <a href="{{route('teacher.exercises.create', $course->id)}}" class="btn btn-primary">Create</a>--}}
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <tr class="table-secondary">
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Thông tin</th>
                        <th></th>
                    </tr>
                    @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->id }}</td>
                        <td>{{ $lesson->content }}</td>
                        <td>{{ $lesson->description }}</td>
                        <td><a href="{{ route('teacher.lessons.show', [$course->id,$lesson->id]) }}" class="btn btn-info">Chi tiết</a></td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>




@endsection
