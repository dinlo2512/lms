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
        <p>Dashboard</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1"> Course Details</h1>
            <div class="form-group">
                <form action="" method="post" class="form-control">
                    @foreach($course as $value)
                        <label for="">
                            Teacher:
                        </label>
                        <input type="text" class="form-control" readonly value="{{ $value->teacher_name }}">
                        <br>
                        <label for="course">
                            Course:
                        </label>
                        <input type="text" readonly class="form-control" value="{{ $value->name }}">
                        <br>
                        <label for="course">
                            Subject:
                        </label>
                        <input type="text" readonly class="form-control" value="{{ $value->subject }}">
                        <br>
                        <label for="">
                            Open Date:
                        </label>
                        <input type="date" name="open_date" class="form-control" value="{{ date('Y-m-d', strtotime($value->open_date)) }}">
                        <br>
                        <label for="">
                            Close Date:
                        </label>
                        <input type="date" name="close_date" class="form-control" value="{{ date('Y-m-d', strtotime($value->close_date)) }}">
                    @endforeach
                        <br>
                    <button class="btn btn-primary"> Save</button>
                        <a href="{{ route('teacher.admin.allCourse') }}"> Back</a>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users->users as $user)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>MHV{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($user->date_of_birth)) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </form>
            </div>
        </div>
    </div>
@endsection
