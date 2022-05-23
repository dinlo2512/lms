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
            <a href="{{ route('teacher.admin.allSubject') }}">
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
        <p>Dashboard</p>
    </div>
    <div class="content">
        <div class="main">
            @if($message = Session::get('success'))
                <script>
                    Swal.fire({
                        title: '{{ $message }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    })
                </script>
            @endif
            <div class="table-responsive">
                <h1 class="h1">Course Management</h1>
                <div>
                    <a href="{{ route('teacher.admin.createCourse') }}" class="btn btn-primary">
                        Create New Course
                    </a>
                </div>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Teacher</th>
                        <th>Open_date</th>
                        <th>Close_date</th>
                        <th>Students</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <tbody>
                    @foreach($courses as $course)
                        @php
                        $user = \App\Models\Course::query()
                        ->join('course_user', 'course_user.course_id', '=', 'courses.id')
                        ->where('course_user.course_id', $course->id)
                        ->count('user_id');
                        @endphp
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->subject }}</td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->teacher_name }}</td>
                            <td>{{ date('d/m/Y', strtotime($course->open_date)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($course->close_date)) }}</td>
                            <td>{{ $user }}</td>
                            <td><a href="{{ route('teacher.admin.editCourse', $course->id) }}" class="btn btn-warning">Edit</a></td>
                            <td><a href="{{ route('teacher.admin.deleteCourse', $course->id) }}" class="btn btn-danger delete">
                                    Delete</a>
                                <script>
                                    $('.delete').click(function (e) {
                                        e.preventDefault();
                                        var self = $(this);
                                        console.log(self.data('title'));
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                location.href = self.attr('href');
                                            }
                                        })
                                    })
                                </script>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $courses->appends(request()->only('select','name'))->links('teacher::paginate.my_paginate') }}
        </div>
    </div>
@endsection
