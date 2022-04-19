@extends('my')
@section('content')
    <div class="content-top">
        <h3>{{ $course->name }}</h3>
        <p>Dashboard / My Courses / {{ $course->name }} / {{ $lesson->content }}</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1">Tất cả bài tập</h1>
            <div class="card">
                @foreach($exercises as $exercise)
                    @if(isset($exercise->status))
                        <p class="p" type="button" data-toggle="collapse"
                           data-target="#collapse-menu-{{ $loop->index+1 }}">Bài Tập {{ $exercise->content }}:</p>
                        <div class="collapse" id="collapse-menu-{{ $loop->index+1 }}">

                            <div class="card card-body">
                                <a href="{{ route('my.exercise', [$course->id,$lesson->id,$exercise->id]) }}"
                                   type="button" class="btn btn-info"> Nộp bài tập</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <a href="{{ route('my.course',$course->id) }}" class="btn btn-info" style="margin: 10px 20px"><i class="fas fa-angle-double-left"></i> Trở về </a>
        </div>
    </div>

@endsection
