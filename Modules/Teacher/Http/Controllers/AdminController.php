<?php


namespace Modules\Teacher\Http\Controllers;

use App\Models\Announcement;
use App\Models\Course;
use App\Models\Notification;
use App\Models\Subjects;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Teacher\Http\Requests\CoursesRequest;
use Modules\Teacher\Http\Requests\SubjectRequest;
use Modules\Teacher\Http\Requests\TeacherRequest;
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
        $users = User::all();

        return view('teacher::Admin.createCourse', compact('title', 'teachers','users'));
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeCourse(CoursesRequest $request)
    {
         $course = Course::query()->create([
           'name' => $request->get('name'),
           'subject' => $request->get('subject'),
           'description' => $request->get('description'),
           'total' => $request->get('total'),
           'open_date' => $request->get('open_date'),
           'close_date' => $request->get('close_date'),
           'teacher_id' => $request->get('teacher'),
        ]);
         $course->users()->sync($request->input('user',[]));

        return redirect(route('teacher.admin.allCourse'))->with('success', 'Success!!');

//        echo "<pre>";
//        print_r($request->input('user',[]));
//        echo "</pre>";

    }

    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect(route('teacher.admin.allCourse'))->with('success', 'Success!!');
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

    public function editCourse($id)
    {
        $title = "Edit Course";
        $course = Course::query()
        ->select('courses.id','courses.name','courses.subject','courses.description','courses.status','courses.open_date','courses.close_date','teachers.name as teacher_name')
        ->join('teachers', 'teachers.id', '=', 'courses.teacher_id')
        ->where('courses.id', $id)->get();
        $users = Course::findOrFail($id);

        return view('teacher::Admin.editCourse', compact('title', 'course','users'));
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

    public function passwordUser($id)
    {
        $user = User::findOrfail($id);
        $user->update([
            'password' => bcrypt(date('dmY', strtotime($user->date_of_birth))),
        ]);

        return redirect()->back()->with('success', 'Success!!');
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

    public function deleteTeacher($id)
    {
//        $teacher  = Teacher::findOrFail($id);
//        $teacher->delete();

        return redirect('teacher.admin.deleteTeacher')->with('success', 'Success!!');
    }

    public function allNotification()
    {
        $title = "Notification";
        $notis = Notification::query()
            ->join('teachers', 'teachers.id', '=', 'notifications.teacher_id')
            ->paginate(5);

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

        return redirect(route('teacher.admin.allUser'))->with('success', 'Success!!');
    }

    public function deleteUser($id)
    {
        $user = User::FindOrFail($id);
        $user->delete();

        return redirect(route('teacher.admin.allUser'))->with('success', 'Success!!');
    }

    public function createTeacher()
    {
        $title = "Create Teacher";
        return view('teacher::Admin.createTeacher', compact('title'));
    }

    public function storeTeacher(TeacherRequest $request)
    {
//            echo "<pre>";
//            print_r($request->all());
//            echo "</pre>";
        Teacher::query()->create([
            'name' => $request->get('name'),
            'date_of_birth' => $request->get('date_of_birth'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => bcrypt(date('dmY', strtotime($request->get('date_of_birth')))),
            'phone_number' => $request->get('phone_number'),
            'address' => $request->get('address'),
            'role_id' => $request->get('role'),
        ]);

        return redirect(route('teacher.admin.allTeacher'))->with('success', 'Success!!');
    }

    public function createNotification()
    {
        $title = "Notification";
        return view('teacher::Admin.createNotification', compact('title'));
    }

    public function storeNotification(Request $request)
    {

        $request->validate([
            'content' => 'required',
            'title' => 'required',
        ]);
//                echo "<pre>";
//        print_r($request->all());
//        echo "</pre>";
        $teacher = Auth::guard('teacher')->user()->id;
        Notification::create([
            'teacher_id' =>  $teacher,
            'content' =>  $request->get('content'),
            'title' =>  $request->get('title'),
        ]);

        return redirect(route('teacher.admin.allNotification'))->with('success', 'Success!!');
    }

    public function allSubject()
    {
        $title = 'All Subject';
        $subjects = Subjects::paginate(8);

        return view('teacher::Admin.subjects', compact('title', 'subjects'));
    }

    public function createSubject()
    {
        $title = 'Create Subject';

        return view('teacher::Admin.createSubject', compact('title'));
    }

    public function storeSubject(SubjectRequest $request)
    {
        $file =$request->file('image');
        if (isset($file)){
            $name = time(). '.' . $file->getClientOriginalName();
            Subjects::query()->create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'image' => $name,
            ]);

            $file->storeAs('public/admin/avatar',$name);

            return redirect(route('teacher.admin.allSubject'))
                ->with('success','Success!!');
        }else{
            Subjects::query()->create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);

            return redirect(route('teacher.admin.allSubject'))
                ->with('success','Success!!');
        }
    }

    public function editSubject($id)
    {
        $title = 'Edit Subject';
        $subject = Subjects::findOrFail($id);

        return view('teacher::Admin.editSubject', compact('title', 'subject'));
    }

    public function updateSubject(SubjectRequest $request,$id)
    {
        $file =$request->file('image');
        $subject = Subjects::findOrFail($id);
        if (isset($file)){
            $name = time(). '.' . $file->getClientOriginalName();
            Subjects::query()->where('id',$id)->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'image' => $name,
            ]);

            $file->storeAs('public/admin/avatar',$name);
            if(isset($subject->image)){
                unlink(storage_path('app/public/admin/avatar/'.$subject->image));
            }

            return redirect(route('teacher.admin.allSubject'))
                ->with('success','Success!!');
        }else{
            Subjects::query()->where('id',$id)->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);

            return redirect(route('teacher.admin.allSubject'))
                ->with('success','Success!!');
        }
    }
}

