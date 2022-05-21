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
        <p>Subject</p>
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
            <h1 class="h1"> Subject Management </h1>
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('teacher.admin.createSubject') }}" class="btn btn-primary">
                            Create New Subject
                        </a>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Update At</th>
                            <th colspan="2">Action</th>
                        </tr>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $subject->id }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->description }}</td>
                                <td>{{ $subject->image }}</td>
                                <td>{{ date('d/m/Y', strtotime($subject->created_at)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($subject->updated_at)) }}</td>
                                <td><a href="{{ route('teacher.admin.editSubject', $subject->id) }}" class="btn btn-warning">
                                        Sửa</a></td>
                                <td>
                                    <a href="" class="btn btn-danger delete">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
