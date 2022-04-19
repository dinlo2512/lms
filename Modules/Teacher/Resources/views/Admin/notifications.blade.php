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
            <a href="" class="{{ request()->path() ? "actived" : "" }}">
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
                    Create Notifications
                </a>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Content</th>
                        <th>Title</th>
                        <th>Created_at</th>
                        <th>Update_at</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach($notis as $noti)
                        <tr>
                            <td>{{ $noti->id }}</td>
                            <td>{{ $noti->content }}</td>
                            <td>{{ $noti->title }}</td>
                            <td>{{ date('d/m/Y', strtotime($noti->created_at)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($noti->updated_at)) }}</td>
                            <td><a href="" class="btn btn-danger delete">
                                    Xóa</a>
                                <script>
                                    $('.delete').click(function (e){
                                        e.preventDefault();
                                        var self = $(this);
                                        console.log(self. data('title'));
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
                </table>
            </div>
        </div>
    </div>
@endsection

