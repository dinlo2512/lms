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
            <a href="{{ route('teacher.admin.allNotification') }}" class="actived">
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
        <p>Notification / Create Notification</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1">Notification Create</h1>
            <div class="form-group">
                <form action="{{ route('teacher.admin.storeNotification') }}" method="post">
                    @csrf
                    <label for="content">
                        Content:
                    </label>
                    @error('content')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control" name="content" value="{{ old('content') }}">
                    <br>
                    <label for="title">
                        Title:
                    </label>
                    @error('title')
                    <p class="error">{{ $message }}</p>
                    @enderror
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    <br>
                    <button class="btn btn-success">Save</button>
                    <a href="{{ route('teacher.admin.allNotification') }}" >Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
