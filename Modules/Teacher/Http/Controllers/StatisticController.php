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
        $course_date = Course::select('open_date', 'close_date')->where('id', $course->id)->first();
        $lessons = Lesson::query()->where('course_id', $courseId)->get();
//        $date = Attendance::query()->select('day')->distinct()->get();
//        dd($date);
//        foreach($date as $val){
//            $a = getdate(strtotime( $val->day));
//            echo     $a['mday']."<br>";
//            echo     $a['mon']."<br>";
//        }
        $diff = abs(strtotime($course_date->close_date) - strtotime($course_date->open_date));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

//        dd($months);
        return view('teacher::statistics.index',
            compact('course','lessons','title','course_date', 'months'));
    }

}
