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
        <h3>Exericses</h3>
        <p>Dashboard/{{$course->name}}</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1"><u>Bài tập: {{ $exercises->content }}</u></h1>
            <form action="{{ route('teacher.grades.update', [$course->id,$lesson->id,$exercises->id]) }}" method="post">
                @csrf
                @if($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <div class="table-responsive ">
                    <table class="table table-bordered">
                        <tr class="table-secondary">
                            <th width="5%">STT</th>
                            <th width="10%">Mã học viên</th>
                            <th>Tên</th>
                            <th width="10%">Ngày sinh</th>
                            <th width="15%">Bài tập</th>
                            <th width="10%">Điểm</th>
                        </tr>
                        @foreach($grades as $grade)
                            <tr>
                                <td>{{ $grade->id }}</td>
                                <td>MHV{{ $grade->user_id }}</td>
                                <td>{{ $grade->name }}</td>
                                <td>{{ date('d/m/Y',strtotime($grade->date_of_birth)) }}</td>
                                <td><a href="{{ route('teacher.grades.view', $grade->id) }}">{{ $grade->file }}</a></td>
                                <td><input class="form-control" type="text" value="{{ $grade->grades }}" name="grade_{{ $grade->user_id }}"></td>
                            </tr>
                        @endforeach
                    </table>
                    <button class="btn btn-primary" style="float: right; margin-right:60px;" name="submit">
                        Lưu điểm</button>
                    <a href="{{ route('teacher.exercises.index',[$course->id,$lesson->id]) }}">Trở về</a>
                </div>
            </form>
        </div>
    </div>

@endsection

