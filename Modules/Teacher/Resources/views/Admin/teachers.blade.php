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
        <p>Teachers</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1"> Teacher Management </h1>
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('teacher.admin.createTeacher') }}" class="btn btn-primary">
                            Create New Teacher
                        </a>
                    </div>

                    <div class="col-md-8">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" name="select">
                                        <option value="0">
                                            --Select--
                                        </option>
                                        <option value="1">
                                            Username
                                        </option>
                                        <option value="2">
                                            Email
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" style="display: inline; width:80%"
                                           placeholder="Search...">
                                    <button class="btn btn-secondary" > Search</button>
                                    @if(isset($_GET['name']))
                                    <a href="{{ route('teacher.admin.allTeacher') }}" style="float: right; margin-right: 33px;margin-top:10px">
                                        clear filter
                                        <i class="fas fa-filter"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>


                </div>

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
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($teacher->date_of_birth)) }}</td>
                            <td>{{ $teacher->username }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->phone_number }}</td>
                            <td>{{ $teacher->address }}</td>
                            <td><a href="{{ route('teacher.admin.deleteTeacher', $teacher->id) }}" class="btn btn-danger delete">
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
            {{ $teachers->appends(request()->only('select','name'))->links('teacher::paginate.my_paginate') }}
        </div>
    </div>
@endsection
