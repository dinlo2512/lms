<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\Course;
use App\Models\Exercise;
use App\Models\Grades;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Modules\Teacher\Http\Requests\CreateExerciseRequest;
use Modules\Teacher\Http\Requests\UpdateExerciseRequest;

class ExerciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.teacher');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($courseId,$lessonId)
    {
        $title = "Lessons";
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::query()->where('course_id', $course->id)->where('lesson_id',$lesson->id)
            ->paginate(6);
        return view('teacher::exercises.index', compact('title', 'course','lesson','exercises'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($courseId,$lessonId)
    {
        $title = "Create Exercise";
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        return view('teacher::exercises.create', compact('title', 'course','lesson'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateExerciseRequest $request
     */
    public function store(CreateExerciseRequest $request, int $courseId,int $lessonId)
    {
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";

        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        Exercise::query()->create([
            'content' => $request->get('content'),
            'deadline' => $request->get('deadline'),
            'course_id' => $course->id,
            'lesson_id' => $lesson->id,
        ]);

        return redirect(route('teacher.exercises.index',[$course->id,$lesson->id]))
            ->with('success', 'Thêm bài tập thành công');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('teacher::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($courseId,$lessonId,$exerciseId )
    {
        $title = 'Update Exercise';
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::findOrFail($exerciseId);

        return view('teacher::exercises.show',
            compact('title','course','lesson','exercises'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateExerciseRequest $request, int $courseId, int $lessonId, int $exerciseId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::findOrFail($exerciseId);

        $update = Exercise::query()->where('id',$exercises->id )->update([
            'content' => $request->get('content'),
            'deadline' => $request->get('deadline'),
            'course_id' => $course->id,
            'lesson_id' => $lesson->id,
        ]);

        return redirect(route('teacher.exercises.index',[$course->id,$lesson->id]))
        ->with('success', 'Sửa bài tập thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($courseId,$lessonId,$exerciseId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::findOrFail($exerciseId);

        Exercise::query()->where('id',$exercises->id )->delete();

        return redirect(route('teacher.exercises.index',[$course->id,$lesson->id]))
            ->with('success', 'Xóa bài tập thành công');
    }

    public function give($courseId,$lessonId,$exerciseId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::findOrFail($exerciseId);

        foreach ($course->users as $user){
           Grades::query()->create([
                'exercise_id' => $exercises->id,
                'user_id' => $user->id,
            ]);
        }
        Exercise::query()->where('id', $exercises->id)->update([
           'status' => 1,
        ]);

        return \redirect(route('teacher.exercises.index', [$course->id,$lesson->id]))
            ->with('success', 'Giao bài tập thành công');
    }
}
