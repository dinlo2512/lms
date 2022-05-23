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
            <a href="" class="{{ request()->path() ? "actived" : "" }}">
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
        <p>Notification</p>
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
                <h1 class="h1">Notification Management</h1>
                <div>
                    <a href="{{ route('teacher.admin.createNotification') }}" class="btn btn-primary">
                        Create Notification
                    </a>
                </div>
                <br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Content</th>
                        <th>Title</th>
                        <th>Create by</th>
                        <th>Created_at</th>
                        <th>Update_at</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach($notis as $noti)
                        <tr>
                            <td>{{ $noti->id }}</td>
                            <td>{{ $noti->content }}</td>
                            <td>{{ $noti->title }}</td>
                            <td>{{ $noti->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($noti->created_at)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($noti->updated_at)) }}</td>
                            @if($noti->teacher_id == Auth::guard('teacher')->user()->id)
                                <td><a href="" class="btn btn-danger delete">
                                        Xóa</a>
                                    <script>
                                        $('.delete').click(function (e){
                                            e.preventDefault();
                                            var self = $(this);
                                            console.log(self. data('title'));
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
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

