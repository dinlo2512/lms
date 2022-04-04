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
        <h3>Exericses</h3>
        <p>Dashboard/{{$course->name}}</p>
    </div>
    <div class="content">
        <div class="main">
            <h1>Bài tập {{ $exercises->content }}</h1>
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <tr class="table-secondary">
                        <th>STT</th>
                        <th>Mã học viên</th>
                        <th>Tên</th>
                        <th>Điểm</th>
                    </tr>
                    @foreach($grades as $val)
                    <tr>
                        <td>{{ $val->id }}</td>
                        <td>MHV{{ $val->user_id }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->grades }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>




@endsection

