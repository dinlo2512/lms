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
            <a href="{{ route('teacher.exercises.index', $course->id) }}">
                <i class="fas fa-home"></i>
                <span class="links_name">Learning</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.showTeacher') }}">
                <i class="fas fa-cog"></i>
                <span class="links_name">Setting</span>
            </a>

        </li>
    </ul>
@endsection

@section('content')

    <div class="content-top">
        <h3>Create Exercises</h3>
        <p>{{ $course->name }}</p>
    </div>
    <div class="content">
        <div class="main">
            <br><br>
            <div class="form-group form" >
                <form action="{{ route('teacher.exercises.store', $course->id) }}" method="post">
                    @csrf
                    <label for="content"><p>Content</p></label>
                    @error('content')
                    @foreach($errors->get('content') as $error)
                        <p class="error">{{$error}}</p>
                    @endforeach
                    @enderror
                    <input type="text" name="content" id="content" class="form-control" value="{{old('content')}}">


                    <label for="deadline"><p>Deadline</p></label>
                    @error('deadline')
                    @foreach($errors->get('deadline') as $error)
                        <p class="error">{{$error}}</p>
                    @endforeach
                    @enderror
                    <input type="datetime-local" name="deadline" id="deadline" class="form-control" value="{{old('deadline')}}">
                    <br>
                    <button class="btn btn-primary" name="submit" > Lưu</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form label p{
            font-size: 25px;
        }

        .form{
            padding:0 20px;
        }
    </style>
@endsection
