
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
            <a href="{{ route('teacher.admin.allUser') }}" >
                <i class="fas fa-user"></i>
                <span class="links_name">User</span>
            </a>
        </li>
        <li>
            <a href="" class="{{ request()->path() ? "actived" : "" }}">
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
        <p>Users</p>
    </div>
    <div class="content">
        <div class="main">
            <div class="table-responsive">
                <a href="" class="btn btn-primary">
                    Create User
                </a>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone_number</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($teacher->date_of_birth)) }}</td>
                            <td>{{ $teacher->username }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->phone_number }}</td>
                            <td>{{ $teacher->address }}</td>
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
