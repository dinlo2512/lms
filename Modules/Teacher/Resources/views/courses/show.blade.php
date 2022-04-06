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
        <a href="{{route('teacher.courses.show', $course->id)}}">
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
        <a href="{{route('teacher.showTeacher')}}">
            <i class="fas fa-cog"></i>
            <span class="links_name">Setting</span>
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
                    <a href="" type="button" data-toggle="collapse" data-target="#collapse-menu"><i class="far fa-user"></i><h5>Điểm danh</h5></a>
                    <hr>
                    <div class="collapse" id="collapse-menu">
                        <input type="date" readonly value="" style="padding-left: 20px; margin-left: 20px; ">
                        <div class="col-md-12 mt-1 card card-body">
                            <div class="table-responsive">
                                <form action="">
                                    <table class="table table-bordered">
                                        <tr class="table-secondary">
                                            <th>STT</th>
                                            <th>Mã HV</th>
                                            <th>Tên</th>
                                            <th>Ngày sinh</th>
                                            <th>Có mặt</th>
                                            <th>Vắng</th>
                                            <th>Muộn</th>
                                            <th>Ghi chú</th>
                                        </tr>
                                        @foreach($students as $student)
                                        <tr>
                                            <td class="td">{{ $loop->index+1 }}</td>
                                            <td>MHV{{$student->id}}</td>
                                            <td class="td">{{ $student->name }}</td>
                                            <td>{{ date('d/m/Y', strtotime($student->date_of_birth)) }}</td>
                                            <td class="td"><input type="radio" name="radio{{ $loop->index+1 }}" value="0"></td>
                                            <td class="td"><input type="radio" name="radio{{ $loop->index+1 }}" value="1"></td>
                                            <td class="td"><input type="radio" name="radio{{ $loop->index+1 }}" value="2"></td>
                                            <td><input type="text" placeholder="Ghi chú ..."></td>
                                        </tr>
                                            @endforeach
                                    </table>
                                    <input type="submit" value="Lưu điểm danh" id="submit-attendance">
                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="" type="button" data-toggle="collapse" data-target="#collapse-menu-2" ><i class="fas fa-lock"></i><h5>Danh sách</h5></a>
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
                                    @foreach($students as $student)
                                    <tr>
                                        <td class="td">{{ $loop->index+1 }}</td>
                                        <td>MHV{{$student->id}}</td>
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
        .td {
            width: 60px;
        }
        input[type="text"] {
            border: none;
            width: 100%;
        }
    </style>


@endsection


