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
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Update At</th>
                            <th colspan="3" style="width: 20%">Action</th>
                        </tr>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $subject->id }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>
                                    @if(isset($subject->image))
                                        <img class="subject" src="{{ asset('storage/admin/avatar/'.$subject->image) }}"
                                             alt="ảnh">
                                    @endif
                                </td>
                                <td>{{ date('d/m/Y', strtotime($subject->created_at)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($subject->updated_at)) }}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button"
                                            data-url="{{ route('teacher.admin.showSubject', $subject->id) }}"
                                            class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                        Xem
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Subject Detail</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="name">
                                                        Name:
                                                    </label>
                                                    <h4 id="name">

                                                    </h4>
                                                    <br>
                                                    <label for="description">
                                                        Description
                                                    </label>
                                                    <h4 id="description">

                                                    </h4>
                                                    <br>
                                                    <label for="created_at">
                                                        Created At
                                                    </label>
                                                    <h4 id="created_at">

                                                    </h4>
                                                    <br>
                                                    <label for="updated_at">
                                                       Updated at
                                                    </label>
                                                    <h4 id="updated_at">

                                                    </h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="{{ route('teacher.admin.editSubject', $subject->id) }}"
                                       class="btn btn-warning">
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
    <style>
        .subject {
            width: 80px;
            height: 50px;
            border-radius: 50%;
        }

        #subject {
            width: 80px;
            height: 50px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn-info').click(function () {
                var url = $(this).attr('data-url');

                $.ajax({
                    type: "get",
                    url: url,
                    success: function (response) {
                        $('h4#name').text(response.data.name)
                        $('h4#description').text(response.data.description)
                        $('h4#updated_at').text(response.data.updated_at)
                        $('h4#created_at').text(response.data.created_at)
                    },
                    error: function (jqXHR, textStatus, errorThrown){

                    }
                })
            })
        })
    </script>
@endsection
