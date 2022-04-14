@extends('teacher::layouts.home')

@section('nav-list')
    <ul class="nav-list">
        <li>
            <a href="{{ route('teacher.courses.index') }}">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.courses.show', $course->id) }}">
                <i class="fas fa-user"></i>
                <span class="links_name">Student</span>
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.lessons.index', $course->id) }}">
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
            <a href="{{ route('teacher.showTeacher') }}">
                <i class="fas fa-cog"></i>
                <span class="links_name">Setting</span>
            </a>

        </li>
        <li>
            <a href="">
                <i class="fas fa-calendar"></i>
                <span class="links_name">Statistic</span>
            </a>

        </li>
    </ul>
@endsection

@section('content')
    <div class="content-top">
        <h3>Statistic</h3>
        <p>Dashboard/{{ $course->name }}/Statistic</p>
    </div>
    <div class="content">
        <div class="main">
            <h1 class="h1"> Thống kê điểm danh</h1>
            <div class="table-responsive">
                <table class="table table-striped table-bordered ">
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th width="10%" >Số buổi có mặt</th>
                        <th width="10%">Số buổi vắng </th>
                        <th width="10%">Số buổi muộn</th>
                        <th width="10%">Số buổi vắng (có phép)</th>
                        <th>Tổng số buổi</th>
                    </tr>
                    @foreach($course->users as $user)
                        @php
                            $present = \App\Models\Attendance::query()->where('user_id', $user->id)
                                          ->where('status', '=', '1')
                                          ->where('course_id', $course->id)
                                          ->count();

                            $absent = \App\Models\Attendance::query()->where('user_id', $user->id)
                                          ->where('status', '=', '-1')
                                          ->where('course_id', $course->id)
                                          ->count();

                            $late = \App\Models\Attendance::query()->where('user_id', $user->id)
                                          ->where('status', '=', '0')
                                          ->where('course_id', $course->id)
                                          ->count();

                            $leave = \App\Models\Attendance::query()->where('user_id', $user->id)
                                          ->where('status', '=', '2')
                                          ->where('course_id', $course->id)
                                          ->count();

                            $all = \App\Models\Attendance::query()->where('user_id', $user->id)
                                          ->where('course_id', $course->id)
                                          ->count('status');
                        @endphp
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($user->date_of_birth)) }}</td>
                            <td>{{ $present }}</td>
                            <td>{{ $absent }}</td>
                            <td>{{ $late }}</td>
                            <td>{{ $leave }}</td>
                            <td>{{ $all }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


@endsection

