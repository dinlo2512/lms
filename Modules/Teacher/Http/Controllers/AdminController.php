<?php


namespace Modules\Teacher\Http\Controllers;

use App\Models\Announcement;
use App\Models\Course;
use App\Models\Notification;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        $title = "Teacher Admin";
        return view('teacher::Admin.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($courseId)
    {

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $courseId)
    {

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

    }

    public function allCourse()
    {
        $title = "All Courses";
        $courses = Course::query()
            ->select('courses.id','courses.name','courses.subject','courses.description','courses.status','courses.open_date','courses.close_date','teachers.name as teacher_name')
            ->join('teachers', 'teachers.id', '=', 'courses.teacher_id')
            ->get();

        return view('teacher::Admin.courses', compact('title', 'courses'));
    }

    public function allUser()
    {
        $title = "All User";
        $users = User::all();

        return view('teacher::Admin.users', compact('title', 'users'));
    }

    public function allTeacher()
    {
        $title = "All Teacher";
        $teachers = Teacher::all();

        return view('teacher::Admin.teachers', compact('title', 'teachers'));
    }

    public function allNotification()
    {
        $title = "Notification";
        $notis = Notification::where('teacher_id',Auth::guard('teacher')->user()->id)->paginate(5);

        return view('teacher::Admin.notifications', compact('title', 'notis'));
    }
}

