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
use Modules\Teacher\Http\Requests\CoursesRequest;
use Modules\Teacher\Http\Requests\UserRequest;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.teacher');
        $this->middleware('checkadmin');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Teacher Admin";
//        $user = Auth::guard('teacher')->user();
//        dd($user);
        return view('teacher::Admin.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function createCourse()
    {
        $title = "Create Course";
        $teachers = Teacher::where('role_id', 1)->get();
        return view('teacher::Admin.createCourse', compact('title', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeCourse(CoursesRequest $request)
    {
        Course::query()->create([
           'name' => $request->get('name'),
           'subject' => $request->get('subject'),
           'description' => $request->get('description'),
           'open_date' => $request->get('open_date'),
           'close_date' => $request->get('close_date'),
           'teacher_id' => $request->get('teacher'),
        ]);

        return redirect(route('teacher.admin.allCourse'))->with('success', 'Thành công!!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allCourse()
    {
        $title = "All Courses";
        $courses = Course::query()
            ->select('courses.id','courses.name','courses.subject','courses.description','courses.status','courses.open_date','courses.close_date','teachers.name as teacher_name')
            ->join('teachers', 'teachers.id', '=', 'courses.teacher_id')
            ->orderByDesc('courses.created_at')
            ->paginate(5);

        return view('teacher::Admin.courses', compact('title', 'courses'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allUser()
    {
        $title = "All User";
        if (request()->get('select') == 1){
            $name = request()->get('name');
            $users = User::where('username', 'LIKE','%'.$name.'%')->paginate(8);
        }
        elseif (request()->get('select') == 2){
            $name = request()->get('name');
            $users = User::where('email', 'LIKE','%'.$name.'%')->paginate(8);
        }
        elseif (request()->get('select') == 0){
            $name = request()->get('name');
            $users = User::where('name', 'LIKE','%'.$name.'%')->paginate(8);
        }
        else{
            $users = User::paginate(8);
        }

        return view('teacher::Admin.users', compact('title', 'users'));
    }

    public function allTeacher(Request $request)
    {
        $title = "All Teacher";

        if (request()->get('select') == 1){
            $name = request()->get('name');
            $teachers = Teacher::where('username', 'LIKE','%'.$name.'%')->paginate(8);
        }
        elseif (request()->get('select') == 2){
            $name = request()->get('name');
            $teachers = Teacher::where('email', 'LIKE','%'.$name.'%')->paginate(8);
        }
        elseif (request()->get('select') == 0){
            $name = request()->get('name');
            $teachers = Teacher::where('name', 'LIKE','%'.$name.'%')->paginate(8);
        }
        else{
            $teachers = Teacher::paginate(8);
        }

        return view('teacher::Admin.teachers', compact('title', 'teachers'));
    }

    public function allNotification()
    {
        $title = "Notification";
        $notis = Notification::where('teacher_id',Auth::guard('teacher')->user()->id)->paginate(5);

        return view('teacher::Admin.notifications', compact('title', 'notis'));
    }

    public function role()
    {
        $title = "Roles";
        $teachers = Teacher::query()->select('teachers.id', 'teachers.name','teachers.role_id', 'roles.name as role_name')
            ->join('roles' , 'roles.id', '=', 'teachers.role_id')
        ->paginate(5);

        return view('teacher::Admin.role',compact('teachers', 'title'));
    }

    public function saveRole(Request $request)
    {
        $teacherId = $request->teacher_id;
        $role = $request->role_id;

        Teacher::where('id', $teacherId)->update([
            'role_id' => $role,
        ]);
    }

    public function createUser()
    {
        $title = "User Create";
        return view('teacher::Admin.createUser' ,compact('title'));
    }

    public function storeUser(UserRequest $request)
    {
//        echo "<pre>";
//        print_r($request->all());
//        echo "</pre>";
        User::query()->create([
            'name' => $request->get('name'),
            'date_of_birth' => $request->get('date_of_birth'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => bcrypt(date('dmY', strtotime($request->get('date_of_birth')))),
            'phone_number' => $request->get('phone_number'),
            'address' => $request->get('address'),

        ]);

        return redirect(route('teacher.admin.allUser'))->with('success', 'Thành công!!');
    }

    public function deleteUser($id)
    {
        $user = User::FindOrFail($id);
        $user->delete();

        return redirect(route('teacher.admin.allUser'))->with('success', 'Thành công!!');

    }
}

