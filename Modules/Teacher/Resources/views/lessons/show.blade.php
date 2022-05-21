@extends('teacher::layouts.home')

@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="{{ route('teacher.courses.index') }}">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.courses.show', $course->id) }}">
                <i class="fas fa-user"></i>
                <span class="links_name">Student</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.lessons.index', $course->id) }}" class="actived">
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
            <a href="{{ route('teacher.showTeacher') }}">
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
        <h3>Update Exercises</h3>
        <p>Dashboard/{{ $course->name }}/Lessons</p>
    </div>
    <div class="content">
        <div class="main">
            <h3 style="padding-left: 20px; padding-top: 20px; ">Sửa bài học</h3>
            <div class="form-group form" >
                <form action="{{ route('teacher.lessons.update', [$course->id, $lesson->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="content"><p>Lớp</p></label>
                    <input type="text" class="form-control" readonly value="{{ $course->name }}">


                    <label for="content"><p>Nội dung</p></label>
                    @error('content')
                    @foreach($errors->get('content') as $error)
                        <p class="error">{{$error}}</p>
                    @endforeach
                    @enderror
                    <input type="text" name="content" id="content" class="form-control" value="{{ $lesson->content }}">

                    <label for="deadline"><p>Mô tả</p></label>
                    @error('description')
                    @foreach($errors->get('description') as $error)
                        <p class="error">{{ $error }}</p>
                    @endforeach
                    @enderror
                    <input type="text" name="description" id="deadline" class="form-control" value="{{ $lesson->description }}">
                    <br>
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-primary" name="submit" > Lưu</button>
                    <a href="{{ route('teacher.lessons.index', $course->id) }}"> Trở về</a>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form label p{
            font-size: 25px;
        }

        .form{
            padding:6px 20px;
        }
    </style>
@endsection

