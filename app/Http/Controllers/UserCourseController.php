<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitExerciseRequest;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Grades;
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
        return view('dashboard', compact('title', 'user'));
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
        $lessons = Lesson::query()->where('course_id', $course->id)->get();

        return view('course', compact('title', 'course', 'lessons'));
    }

    public function lesson($courseId, $lessonId)
    {
        $title = "Lesson";
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::query()->where('course_id', $courseId)
            ->where('lesson_id', $lessonId)
            ->orderByDesc('created_at')
            ->get();

        return view('lesson', compact('title', 'lesson', 'course', 'exercises'));
    }

    public function exercise($courseId, $lessonId, $exerciseId)
    {
        $title = "Exercise";
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercise = Exercise::findOrFail($exerciseId);
        $grade = Grades::where('exercise_id',$exerciseId)->where('user_id',Auth::user()->id)->first();
//        dd($grade->file);

        return view('exercise', compact('title', 'lesson', 'course', 'exercise','grade'));
    }

    public function store(SubmitExerciseRequest $request, $exerciseId, $userId)
    {
        $file = $request->file('exercise');
        $grade = Grades::where('exercise_id',$exerciseId)->where('user_id',$userId)->first();
        if (isset($file)){
            $name = time() . '.' . $file->getClientOriginalName();
            Grades::query()->where('exercise_id', $exerciseId)
                ->where('user_id', $userId)->update([
                    'file' => $name,
                ]);
            $file->storeAs('public/user/file', $name);
            if (isset($grade->file)) {
                unlink(storage_path('app/public/user/file/' . $grade->file));
            }
        }

        return redirect()->back()->with('success', 'Nộp bài tập thành công');
    }

    public function view($id)
    {
        $lesson = Lesson::findOrFail($id);
        $exercises = Grades::findOrFail($id);
        return view('view', compact('lesson', 'exercises'));
    }

    public function viewExercises($id)
    {
        $exercises = Grades::findOrFail($id);
        return view('viewexercise', compact('exercises'));
    }
}
