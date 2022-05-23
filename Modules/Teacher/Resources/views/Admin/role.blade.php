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
            <a href="" class="actived">
                <i class="fas fa-dice-d6"></i>
                <span class="links_name">Roles</span>
            </a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="content-top">
        <h3>Welcome </h3>
        <p>Roles</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1"> Role Management </h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width:10%">STT</th>
                        <th style="width:10%">TeacherID</th>
                        <th>Name</th>
                        <th>Role Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>
                            <select name="" class="form-control"
                                    onchange="updateRole(this, {{ $teacher->id }})">
                                <option value="1"
                                @if ($teacher->role_id == 1)
                                    selected
                                @endif  >
                                    Teacher
                                </option>
                                <option value="2"
                                @if ($teacher->role_id == 2)
                                    selected
                                @endif  >
                                    Admin
                                </option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            {{ $teachers->links('teacher::paginate.my_paginate') }}
        </div>
    </div>
    <script type="text/javascript">
        function updateRole(that, teacherId){
            role = $(that).val()

            $.post('{{ route('teacher.admin.saveRole') }}',{
                '_token': '{{ csrf_token() }}',
                'teacher_id': teacherId,
                  'role_id':  role
                },
                function(data){})
        }

    </script>

@endsection
