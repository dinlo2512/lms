@extends('teacher::layouts.home')

@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="{{route('teacher.courses.index')}}">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Dashboard</span>
            </a>

        </li>
        <li>
            <a href="{{route('teacher.courses.show', $course->id)}}" class="{{ request()->path() ? "actived" : "" }}">
                <i class="fas fa-user"></i>
                <span class="links_name">Student</span>
            </a>

        </li>
        <li>
            <a href="{{route('teacher.lessons.index', $course->id)}}">
                <i class="fas fa-home"></i>
                <span class="links_name">Learning</span>
            </a>
        </li>
        <li>
            <a href="{{route('teacher.announcements.index',$course->id)}}">
                <i class="fas fa-bullhorn"></i>
                <span class="links_name">Announcements</span>
            </a>

        </li>
        <li>
            <a href="{{route('teacher.showTeacher')}}">
                <i class="fas fa-cog"></i>
                <span class="links_name">Setting</span>
            </a>

        </li>
        <li>
            <a href="{{ route('teacher.statistic.index', $course->id) }}">
                <i class="fas fa-calendar"></i>
                <span class="links_name">Statistic</span>
            </a>

        </li>
    </ul>
@endsection

@section('content')
    <div class="content-top">
        <h3>Course</h3>
        <p>Dashboard/ {{$course->name}}</p>
    </div>
    <div class="content">
        <div class="main">
            <div class="row">
                <div class="col-md-12 mt-1 setting-menu">
                    <a href="" type="button" data-toggle="collapse" data-target="#collapse-menu"><i
                            class="far fa-user"></i><h5>Điểm danh</h5></a>
                    <hr>
                    <div>
                        @if($message = Session::get('success'))
                            <div class="alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        @if($get > 0)
                        <form action="{{ route('teacher.course.attendance.update', $course->id) }}" method="POST">
                            @csrf
                            <div style="padding-left: 20px; margin-left: 20px; ">
                                <label for="">Ngày học: </label>
                                @php
                                    $date = date('Y-m-d');
                                @endphp
                                <input type="date" readonly name="date" value="{{ $date }}">
                            </div>
                            <div class="col-md-12 mt-1 card card-body">
                                <div class="table-responsive">
                                    <div class="form-check">
                                        <table class="table table-bordered">
                                            <tr class="table-secondary">
                                                <th>STT</th>
                                                <th>Mã HV</th>
                                                <th>Tên</th>
                                                <th>Ngày sinh</th>
                                                <th width="5%">Có mặt</th>
                                                <th width="5%">Vắng</th>
                                                <th width="5%">Muộn</th>
                                                <th width="5%">Vắng phép</th>
                                                <th>Ghi chú</th>
                                            </tr>
                                            @foreach($attendances as $attendance)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>MHV{{ $attendance->user_id }}</td>
                                                    <td>{{ $attendance->name }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($attendance->date_of_birth)) }}</td>
                                                    <td>
                                                        <input type="radio" name="radio{{ $attendance->user_id }}"
                                                               value="1"
                                                               @if ($attendance->status == 1)
                                                                   checked
                                                               @endif
                                                               class="form-check-input">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="radio{{ $attendance->user_id }}"
                                                               value="-1"
                                                               @if ($attendance->status == -1)
                                                               checked
                                                               @endif
                                                               class="form-check-input">
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="radio{{ $attendance->user_id }}"
                                                               value="0"
                                                               @if ($attendance->status == 0)
                                                               checked
                                                               @endif
                                                               class="form-check-input" >
                                                    </td>
                                                    <td>
                                                        <input type="radio" name="radio{{ $attendance->user_id }}"
                                                               value="2"
                                                               @if ($attendance->status == 2)
                                                               checked
                                                               @endif
                                                               class="form-check-input">
                                                    </td>
                                                    <td><input type="text" placeholder="Ghi chú ..."></td>
                                                </tr>
                                            @endforeach
                                        </table>

                                            <input type="submit" value="Cập nhật điểm danh" class="btn btn-primary"
                                                   name="submit">

                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                            <form action="{{ route('teacher.course.attendance', $course->id) }}" method="POST">
                                @csrf
                                <div style="padding-left: 20px; margin-left: 20px; ">
                                    <label for="">Ngày học: </label>
                                    @php
                                        $date = date('Y-m-d');
                                    @endphp
                                    <input type="date" readonly name="date" value="{{ $date }}">
                                </div>
                                <div class="col-md-12 mt-1 card card-body">
                                    <div class="table-responsive">
                                        <div class="form-check">
                                            <table class="table table-bordered">
                                                <tr class="table-secondary">
                                                    <th>STT</th>
                                                    <th>Mã HV</th>
                                                    <th>Tên</th>
                                                    <th>Ngày sinh</th>
                                                    <th width="5%">Có mặt</th>
                                                    <th width="5%">Vắng</th>
                                                    <th width="5%">Muộn</th>
                                                    <th width="5%">Vắng phép</th>
                                                    <th>Ghi chú</th>
                                                </tr>
                                                @foreach($course->users as $student)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>MHV{{ $student->id }}</td>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($student->date_of_birth)) }}</td>
                                                        <td>
                                                            <input type="radio" name="radio{{ $student->id }}"
                                                                   value="1"
                                                                   class="form-check-input">
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="radio{{ $student->id }}"
                                                                   value="-1"
                                                                   class="form-check-input">
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="radio{{ $student->id }}"
                                                                   value="0"
                                                                   class="form-check-input">
                                                        </td>
                                                        <td>
                                                            <input type="radio" name="radio{{ $student->id }}"
                                                                   value="2"
                                                                   class="form-check-input">
                                                        </td>
                                                        <td><input type="text" placeholder="Ghi chú ..."></td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                            <input type="submit" value="Lưu điểm danh" class="btn btn-primary"
                                                   name="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                    <a href="" type="button" data-toggle="collapse" data-target="#collapse-menu-2"><i
                            class="fas fa-lock"></i><h5>Danh sách</h5></a>
                    <hr>
                    <div class="collapse" id="collapse-menu-2">
                        <div class="col-md-12 mt-1 card card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr class="table-secondary">
                                        <th>STT</th>
                                        <th>Mã HV</th>
                                        <th>Họ Đệm</th>
                                        <th>Tên</th>
                                        <th>Ngày sinh</th>
                                    </tr>
                                    @foreach($course->users as $student)
                                        <tr>
                                            <td class="td">{{ $loop->index+1 }}</td>
                                            <td>MHV{{ $student->id }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td class="td">{{ $student->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($student->date_of_birth)) }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>

        .form-check .form-check-input {
            float: left;
            margin-left: auto;
        }

        input[type="text"] {
            border: none;
            width: 100%;
        }
    </style>


@endsection


