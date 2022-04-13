@extends('my')
@section('content')
    <div class="content-top">
        <h3>{{ $course->name }}</h3>
        <p>Dashboard / My Courses / {{ $course->name }}</p>
    </div>
    <div class="content">
        <div class="main">
            @foreach($lessons as $lesson)
            <div class="lesson">
                <p class="p" type="button" data-toggle="collapse" data-target="#collapse-menu-{{ $loop->index+1 }}" >Bài học {{ $lesson->content }}:</p>
                <div class="collapse" id="collapse-menu-{{ $loop->index+1 }}">
                    <div class="card text-white bg-info mb-3" style="max-width: 100%;">
                        <div class="card-header">
                            <p class="card-text">{{ $lesson->description }}</p>
                            <a href="{{ route('my.lesson.view', $lesson->id) }}">{{ $lesson->file }}</a>
                        </div>
                    </div>
                    <div class="card card-body">
                        <a href="{{ route('my.lesson', [$course->id,$lesson->id]) }}" type="button" class="btn btn-warning"> Làm bài tập</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
