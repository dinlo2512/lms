<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCourseController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Home";
        $user = User::findOrFail(Auth::user()->id);
        return view('dashboard',compact('title','user'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $title = "Course";
        $course = Course::findOrFail($id);
        $lessons = Lesson::query()->where('course_id',$course->id)->get();

        return view('course',compact('title','course','lessons'));
    }

    public function lesson($courseId, $lessonId)
    {
        $title = "Lesson";
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::query()->where('course_id', $courseId)
            ->where('lesson_id', $lessonId)->get();

        return view('lesson',compact('title', 'lesson','course','exercises'));
    }

    public function exercise($courseId, $lessonId,$exerciseId)
    {
        $title = "Exercise";
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercise = Exercise::findOrFail($exerciseId);

        return view('exercise',compact('title', 'lesson','course','exercise'));
    }

    public function store(Request $request, $exerciseId,$userId)
    {
        return $request->all();
    }
}
