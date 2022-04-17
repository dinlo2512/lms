<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Teacher\Http\Requests\AttendanceStoreRequest;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.teacher');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Courses";
        $classes = Course::query()->where('teacher_id', Auth::guard('teacher')->user()->id)
            ->paginate(5);

        return view('teacher::courses.index', compact('classes','title'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('teacher::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($courseid)
    {
        $title = "Course";
        $students = User::whereHas('courses', function (Builder $query) use ($courseid) {
            $query->where('course_id', $courseid);
        })->paginate(10);
        $course = Course::findOrFail($courseid);
        $date = date('Y-m-d');
//        $date = '2022-01-06';
        $get = Attendance::select(['day'])->where('day', $date)->where('course_id', $course->id)->count();
        $attendances = Attendance::query()->join('users', 'users.id', '=', 'attendances.user_id')
            ->where('day', $date)
            ->where('course_id', $course->id)
            ->get();
//        dump($get);
//        dd($attendances->toSql());

        return view('teacher::courses.show',compact('students', 'title','course','get','attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($courseid)
    {
        return view('teacher::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $courseid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($courseid)
    {
        //
    }

    /**
     * @param Request $request
     */
    public function attendanceStore(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        foreach ($course->users as $user){
            Attendance::query()->create([
                'day' => $request->get('date'),
                'course_id' => $course->id,
                'user_id' => $user->id,
                'status' => $request->get('radio'.$user->id),
            ]);
        }

        return redirect(route('teacher.courses.show', $course->id))
            ->with('success', 'Cập nhật điểm danh thành công');

    }

    public function attendanceUpdate(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        foreach ($course->users as $user){
            Attendance::query()->where('day', $request->get('date'))
                ->where('user_id', $user->id)
                ->update([
                'status' => $request->get('radio'.$user->id),
            ]);
        }

        return redirect(route('teacher.courses.show', $course->id))
            ->with('success', 'Cập nhật điểm danh thành công');
////
//        echo "<pre>";
//        print_r($request->all());
//        echo "</pre>";
    }
}
