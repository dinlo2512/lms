@extends('my')
@section('content')
    <div class="content-top">
        <h3>{{ $course->name }}</h3>
        <p>Dashboard / My Courses / {{ $course->name }} / {{ $lesson->content }}</p>
    </div>
    <div class="content">
        <form action="{{ route('my.exercises.post', [$exercise->id, Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="main">
                <h1 class="h1">{{ $exercise->content }}</h1>
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <br><br>
                <input type="text" value="{{ $course->name }}" class="form-control" readonly>
                <br>
                <input type="text" value="{{ $lesson->content }}" class="form-control" readonly>

                <br>
                <textarea class="form-control" type="text" id="editor">
                </textarea>
                <br>
                <input type="file" name="exercise" class="form-control">
                <br>
                @if(isset($grade->file))
                    <a href="{{ route('my.exercises.view', $grade->id) }}">{{ $grade->file }}</a>
                    <br>
                    <button class="btn btn-primary">Nộp lại</button>
                @else
                <br>
                <button class="btn btn-success">Nộp bài</button>
                @endif
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
