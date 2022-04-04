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

class LessonController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($courseId)
    {
        $course = Course::findOrFail($courseId);
        $title = "Lessons";
        $lessons = Lesson::query()->where('course_id', $course->id)->paginate('10');
        return view('teacher::lessons.index',compact('course', 'title', 'lessons'));
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
     * @param Request $request
     */
    public function store(Request $request, int $id)
    {

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($courseId, $lessonId)
    {
        $title = "Lessons";
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);
        $exercises = Exercise::query()->where('course_id', $course->id)->where('lesson_id',$lesson->id)
        ->paginate(10);

        return view('teacher::lessons.show', compact('title', 'course','lesson','exercises'));
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
        //
    }
}

