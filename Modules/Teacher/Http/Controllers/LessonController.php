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
use Modules\Teacher\Http\Requests\CreateLessonRequest;
use Modules\Teacher\Http\Requests\UpdateLessonRequest;

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
    public function create($courseId)
    {
        $title = "Create Lesson";
        $course = Course::findOrFail($courseId);
        return view('teacher::lessons.create', compact('course','title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     */
    public function store(CreateLessonRequest $request, int $courseId)
    {
        $course = Course::findOrFail($courseId);

        Lesson::query()->create([
            'content' => $request->get('content'),
            'description' => $request->get('description'),
            'course_id' => $course->id,
        ]);

        return redirect(route('teacher.lessons.index', $course->id))
            ->with('success', 'Tạo bài tập thành công');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($courseId, $lessonId)
    {
        $title = "Update Lessons";
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);

        return view('teacher::lessons.show', compact('title', 'course', 'lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateLessonRequest $request, $courseId, $lessonId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);

        Lesson::query()->where('id', $lesson->id)->update([
            'content' => $request->get('content'),
            'description' => $request->get('description'),
            'course_id' => $course->id,
            ]);

        return redirect(route('teacher.lessons.index', $course->id))
            ->with('success', 'Sửa bài tập thành công');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($courseId,$lessonId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);

        Lesson::query()->where('id',$lesson->id )->delete();

        return redirect(route('teacher.lessons.index', $course->id))
            ->with('success', 'Xóa bài tập thành công');
    }
}

