@extends('teacher::layouts.home')

@section('nav-list')
<ul class="nav-list">
    <li>
        <a href="{{ route('teacher.admin.allCourse') }}">
            <i class="fas fa-th-large"></i>
            <span class="links_name">Dashboard</span>
        </a>

    </li>
    <li>
        <a href="" class="{{ request()->path() ? "actived" : "" }}">
        <i class="fas fa-chalkboard"></i>
        <span class="links_name">Subject</span>
        </a>

    </li>
    <li>
        <a href="{{ route('teacher.admin.allUser') }}">
            <i class="fas fa-user"></i>
            <span class="links_name">User</span>
        </a>
    </li>
    <li>
        <a href="{{ route('teacher.admin.allTeacher') }}">
            <i class="fas fa-graduation-cap"></i>
            <span class="links_name">Teacher</span>
        </a>

    </li>
    <li>
        <a href="{{ route('teacher.admin.allNotification') }}">
            <i class="fas fa-bell"></i>
            <span class="links_name">Notifications</span>
        </a>

    </li>
    <li>
        <a href="{{ route('teacher.admin.roles') }}">
            <i class="fas fa-dice-d6"></i>
            <span class="links_name">Roles</span>
        </a>
    </li>
</ul>
@endsection

@section('content')
<div class="content-top">
    <h3>Welcome </h3>
    <p>Subject / Create Subject</p>
</div>
<div class="content">
    <div class="main">
        <h1 class="h1">Subject Create</h1>
        <div class="form-group">
            <form action="{{ route('teacher.admin.updateSubject', $subject->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="name">
                    Name:
                </label>
                @error('name')
                <p class="error">{{ $message }}</p>
                @enderror
                <input type="text" class="form-control" name="name" value="{{ $subject->name }}">
                <br>
                <label for="description">
                    Description
                </label>
                @error('description')
                <p class="error">{{ $message }}</p>
                @enderror
                <textarea rows="10" class="form-control" name="description">{{ $subject->description }}</textarea>
                <br>
                @error('image')
                <p class="error">{{ $message }}</p>
                @enderror
                <label for="image">
                    Image
                </label>
                <p>
                    @if(isset($subject->image))
                    <img class="subject" src="{{ asset('storage/admin/avatar/'.$subject->image) }}" alt="ảnh">
                    @endif
                </p>
                <input type="file" class="form-control" name="image">
                <br>
                <button class="btn btn-success" name="submit">Add</button>
                <a href="{{ route('teacher.admin.allSubject') }}"> Back</a>
            </form>
        </div>
    </div>
</div>
<style>
    .form-group{
        margin:10px
    }
     .subject{
         width: 80px;
         height: 50px;

     }

</style>
@endsection

