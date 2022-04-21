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
        <p>Users</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1"> User Management </h1>
            <div class="table-responsive">
                @if($message = Session::get('success'))
                    <script>
                        Swal.fire({
                            title: '{{ $message }}',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                    </script>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('teacher.admin.createUser') }}" class="btn btn-primary">
                            Create New User
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
                                    <input type="text" name="name" class="form-control"
                                           style="display: inline; width:80%"
                                           placeholder="Search...">
                                    <button class="btn btn-secondary"> Search</button>
                                    @if(isset($_GET['name']))
                                        <a href="{{ route('teacher.admin.allUser') }}"
                                           style="float: right; margin-right: 33px;margin-top:10px">
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
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($user->date_of_birth)) }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->address }}</td>
                            <td><a href="" class="btn btn-danger delete">
                                    Xóa</a>
                                <script>
                                    $('.delete').click(function (e) {
                                        e.preventDefault();
                                        var self = $(this);
                                        console.log(self.data('title'));
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "Không thể khôi phục nếu xóa",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Có, Xóa!'
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
            {{ $users->appends(request()->only('select','name'))->links('teacher::paginate.my_paginate') }}
        </div>
@endsection
