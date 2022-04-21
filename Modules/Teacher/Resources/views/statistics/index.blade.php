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
            <a href="" class="actived">
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
                        <th width="10%">Số buổi có mặt</th>
                        <th width="10%">Số buổi vắng</th>
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
            <br> <br>
            <h1 class="h1">Thống kê số buổi đã học</h1>
            <div>

                <h2> Lớp học bắt đầu từ: {{ date('d/m/Y',strtotime($course_date->open_date)) }}
                    - {{ date('d/m/Y',strtotime($course_date->close_date)) }}</h2>
                <table>
                    <tr>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Tháng</option>
                                @php
                                     $open = getdate(strtotime($course_date->open_date));
                                        for ($i = 0; $i <= $months; $i++){
                                            if ($open['mon'] > 12){
                                                $open['mon'] = 1;
                                                echo "<option value='2'> Tháng". $open['mon']++."</option>";
                                                }
                                                 echo "<option value='2'> Tháng". $open['mon']++."</option>";
                                            }
                                @endphp
                            </select>
                        </td>
                        <td>
                            <button style="margin: 10px" class="btn btn-info">
                                Xem
                            </button>
                        </td>
                    </tr>
                </table>


                <br>
                <div class="month">
                    <ul>
                        <li class="prev">&#10094;</li>
                        <li class="next">&#10095;</li>
                        <li style="font-size:30px">Apirl<br><span style="font-size:30px">2022</span></li>
                    </ul>
                </div>

                <ul class="weekdays">
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>Su</li>
                </ul>

                <ul class="days">
                    <li style="opacity:0.5">28</li>
                    <li style="opacity:0.5">29</li>
                    <li style="opacity:0.5">30</li>
                    <li style="opacity:0.5">31</li>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                    <li>8</li>
                    <li>9</li>
                    <li><span class="active">10</span></li>
                    <li>11</li>
                    <li>12</li>
                    <li>13</li>
                    <li>14</li>
                    <li>15</li>
                    <li>16</li>
                    <li>17</li>
                    <li>18</li>
                    <li>19</li>
                    <li>20</li>
                    <li>21</li>
                    <li>22</li>
                    <li>23</li>
                    <li>24</li>
                    <li>25</li>
                    <li>26</li>
                    <li>27</li>
                    <li>28</li>
                    <li>29</li>
                    <li>30</li>
                    <li style="opacity:0.25">1</li>
                </ul>
            </div>
            <br><br>
            <div class="form-group">
                <form class="form-control form">
                    <h2> Danh sách thi học viên</h2>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th style="width:10%">Mã học viên</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Điều kiện</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($course->users as $user)
                            @php
                                $absent = \App\Models\Attendance::query()->where('user_id', $user->id)
                                              ->where('status', '=', '-1')
                                              ->where('course_id', $course->id)
                                              ->count();

                            @endphp
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>MHV{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($user->date_of_birth)) }}</td>
                            @if($absent >= 5)
                            <td>Không đủ điều kiện thi</td>
                            @else
                            <td>Đủ điều kiện thi</td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
                <input type="button" id="create_pdf" value="Xuất file PDF" class="btn btn-danger">
                <script>
                    (function () {
                        var
                            form = $('.form'),
                            cache_width = form.width(),
                            a4 = [595.28, 841.89]; // for a4 size paper width and height

                        $('#create_pdf').on('click', function () {
                            $('body').scrollTop(0);
                            createPDF();
                        });
                        //create pdf
                        function createPDF() {
                            getCanvas().then(function (canvas) {
                                var
                                    img = canvas.toDataURL("image/png"),
                                    doc = new jsPDF({
                                        unit: 'px',
                                        format: 'a4'
                                    });
                                doc.addImage(img, 'JPEG', 20, 20);
                                doc.save('Bhavdip-html-to-pdf.pdf');
                                form.width(cache_width);
                            });
                        }

                        // create canvas object
                        function getCanvas() {
                            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                            return html2canvas(form, {
                                imageTimeout: 2000,
                                removeContainer: true
                            });
                        }

                    }());
                </script>
                <script>
                    /*
                 * jQuery helper plugin for examples and tests
                 */
                    (function ($) {
                        $.fn.html2canvas = function (options) {
                            var date = new Date(),
                                $message = null,
                                timeoutTimer = false,
                                timer = date.getTime();
                            html2canvas.logging = options && options.logging;
                            html2canvas.Preload(this[0], $.extend({
                                complete: function (images) {
                                    var queue = html2canvas.Parse(this[0], images, options),
                                        $canvas = $(html2canvas.Renderer(queue, options)),
                                        finishTime = new Date();

                                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);
                                    $canvas.siblings().toggle();

                                    $(window).click(function () {
                                        if (!$canvas.is(':visible')) {
                                            $canvas.toggle().siblings().toggle();
                                            throwMessage("Canvas Render visible");
                                        } else {
                                            $canvas.siblings().toggle();
                                            $canvas.toggle();
                                            throwMessage("Canvas Render hidden");
                                        }
                                    });
                                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);
                                }
                            }, options));

                            function throwMessage(msg, duration) {
                                window.clearTimeout(timeoutTimer);
                                timeoutTimer = window.setTimeout(function () {
                                    $message.fadeOut(function () {
                                        $message.remove();
                                    });
                                }, duration || 2000);
                                if ($message)
                                    $message.remove();
                                $message = $('<div ></div>').html(msg).css({
                                    margin: 0,
                                    padding: 10,
                                    background: "#000",
                                    opacity: 0.7,
                                    position: "fixed",
                                    top: 10,
                                    right: 10,
                                    fontFamily: 'Tahoma',
                                    color: '#fff',
                                    fontSize: 12,
                                    borderRadius: 12,
                                    width: 'auto',
                                    height: 'auto',
                                    textAlign: 'center',
                                    textDecoration: 'none'
                                }).hide().fadeIn().appendTo('body');
                            }
                        };
                    })(jQuery);

                </script>
            </div>
        </div>
    </div>

    <style>

        ul {
            list-style-type: none;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        /* Month header */
        .month {
            padding: 70px 25px;
            width: 100%;
            background: #1abc9c;
            text-align: center;
        }

        /* Month list */
        .month ul {
            margin: 0;
            padding: 0;
        }

        .month ul li {
            color: white;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        /* Previous button inside month header */
        .month .prev {
            float: left;
            padding-top: 10px;
        }

        /* Next button */
        .month .next {
            float: right;
            padding-top: 10px;
        }

        /* Weekdays (Mon-Sun) */
        .weekdays {
            margin: 0;
            padding: 10px 0;
            background-color: #ddd;
        }

        .weekdays li {
            display: inline-block;
            width: 13.6%;
            color: #666;
            text-align: center;
        }

        /* Days (1-31) */
        .days {
            padding: 10px 0;
            background: #eee;
            margin: 0;
        }

        .days li {
            list-style-type: none;
            display: inline-block;
            width: 13.6%;
            text-align: center;
            margin-bottom: 5px;
            font-size: 12px;
            color: black;
        }

        /* Highlight the "current" day */
        .days li .active {
            padding: 5px;
            background: #1abc9c;
            color: white !important
        }
    </style>


@endsection

