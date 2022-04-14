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
            <a href="">
                <i class="fas fa-calendar"></i>
                <span class="links_name">Statistic</span>
            </a>

        </li>
    </ul>
@endsection
@section('content')

    <div class="content-top">
        <h3>Lessons</h3>
        <p>Dashboard/{{$course->name}}/Lessons</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1"><u>Tất cả bài học của lớp</u></h1>
            @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <a href="{{route('teacher.lessons.create', $course->id)}}" class="btn btn-primary">Tạo bài học</a>
            <div class="table-responsive ">
                <table class="table table-bordered">
                    <tr class="table-secondary">
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Thông tin</th>
                        <th>File Bài Giảng</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($lessons as $lesson)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $lesson->content }}</td>
                        <td>{{ $lesson->description }}</td>
                        <td>
                            @if(isset($lesson->file))
                            <a href="{{ route('teacher.lessons.view',[$course->id,$lesson->id]) }}">Hiển thị</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('teacher.exercises.index', [$course->id,$lesson->id]) }}" class="btn btn-info">Chi tiết</a>
                        </td>
                        <td>
                            <a href="{{ route('teacher.lessons.show', [$course->id, $lesson->id]) }}" class="btn btn-primary">
                                Sửa</a>
                        </td>
                        <td>
                            <a href="{{ route('teacher.lessons.delete', [$course->id, $lesson->id]) }}" class="btn btn-warning" onclick="return confirm('Xóa bài học này?')">
                                Xóa</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>



@endsection
