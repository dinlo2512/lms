<?php


namespace Modules\Teacher\Http\Controllers;

use App\Models\Announcement;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class StatisticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.teacher');
    }

    public function index($courseId)
    {
        $title = "Statistic";
        $course = Course::findOrFail($courseId);
        $lessons = Lesson::query()->where('course_id', $courseId)->get();
//        foreach($course->users as $user){
//
//        }
        return view('teacher::statistics.index',
            compact('course','lessons','title'));
    }

}
