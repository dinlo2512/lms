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
            <a href="{{route('teacher.exercises.index', $course->id)}}">
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
        <h3>Exericses</h3>
        <p>Dashboard/{{$course->name}}</p>
    </div>
    <div class="content">
        <div class="main">
            <h1>Main Content Tất cả bài học của lớp</h1>
            <a href="{{route('teacher.exercises.create', $course->id)}}" class="btn btn-primary">Create</a>
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <tr class="table-secondary">
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Deadline</th>
                        <th>Điểm</th>
                        <th></th>
                    </tr>
                    @foreach($exercises as $exercise)
                        <tr>
                            <td>{{ $exercise->id }}</td>
                            <td>{{ $exercise->content}}</td>
                            <td>{{ $exercise->deadline }}</td>
                            <td>{{ $exercise->grade }}</td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>




@endsection
