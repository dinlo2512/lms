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
                    <div class="card card-body">

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
