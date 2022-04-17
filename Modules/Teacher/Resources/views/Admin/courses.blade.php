@extends('teacher::layouts.home')

@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="" class="{{ request()->path() ? "actived" : "" }}">
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
            <a href="{{ route('teacher.admin.allNotification') }}">
                <i class="fas fa-bell"></i>
                <span class="links_name">Notifications</span>
            </a>

        </li>
    </ul>
@endsection

@section('content')
    <div class="content-top">
        <h3>Welcome </h3>
        <p>Dashboard</p>
    </div>
    <div class="content">
        <div class="main">
            <div class="table-responsive">
                <a href="" class="btn btn-primary">
                    Create Course
                </a>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <td>Teacher</td>
                        <th>Open_date</th>
                        <th>Close_date</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->subject }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->teacher_name }}</td>
                        <td>{{ date('d/m/Y', strtotime($course->open_date)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($course->close_date)) }}</td>
                        <td><a href="" class="btn btn-warning">Sửa</a></td>
                        <td><a href="" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete')">
                                Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
