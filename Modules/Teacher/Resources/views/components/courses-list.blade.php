

<div class="card">
    <div>
        <h3>Các lớp đang giảng dạy</h3>
        <div class="table-responsive ">
            <table class="table table-bordered">
                <tr class="table-secondary">
                    <th>Mã lớp</th>
                    <th>Tên lớp</th>
                    <th>Môn học</th>
                    <th>Thông tin</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th></th>
                </tr>
                @foreach($classes as $class)
                    <tr>
                        <td>{{ $class->id }}</td>
                        <td>{{ $class->name}}</td>
                        <td>{{ $class->subject }}</td>
                        <td>{{ $class->description }}</td>
                        <td>{{ date('d/m/Y', strtotime($class->open_date)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($class->close_date)) }}</td>
                        <td><a href="{{ route('teacher.courses.show',$class->id) }}" class="btn btn-info">Chi tiết</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
