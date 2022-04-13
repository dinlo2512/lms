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

class GradesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.teacher');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($courseId, $lessonId, $exerciseId)
    {
        $title = "Exercises Grades";
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::findOrFail($exerciseId);
        $grades = Grades::query()->join('users', 'users.id', '=', 'grades.user_id')
            ->where('exercise_id', $exercises->id)->paginate(20);
//        dd($exercises->toSql());
        return view('teacher::grades.index',
            compact('title', 'course','exercises','grades','lesson'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     * @param CreateExerciseRequest $request
     */
    public function store(CreateExerciseRequest $request, int $id)
    {

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
    public function edit($id)
    {
        return view('teacher::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $courseId, $lessonId, $exerciseId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::findOrFail($exerciseId);
        $grades = Grades::query()->where('exercise_id', $exercises->id)->get();

        foreach ($grades as $grade){
            Grades::query()->where('exercise_id', $exercises->id)
                ->where('user_id', $grade->user_id)
                ->update([
               'grades' => $request->get('grade_'.$grade->user_id),
            ]);
        }


        return redirect(route('teacher.grades.index',[$course->id,$lesson->id,$exercises->id]))
            ->with('success', 'Lưu điểm thành công');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}

