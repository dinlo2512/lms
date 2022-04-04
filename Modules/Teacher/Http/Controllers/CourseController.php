<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Courses";
        $classes = Course::query()->where('teacher_id', Auth::guard('teacher')->user()->id)
            ->paginate(5);

        return view('teacher::courses.index', compact('classes','title'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('teacher::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($courseid)
    {
        $title = "Course";
        $students = User::whereHas('courses', function (Builder $query) use ($courseid) {
            $query->where('course_id', $courseid);
        })->paginate(10);
      $course = Course::findOrFail($courseid);

        return view('teacher::courses.show',compact('students', 'title','course'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($courseid)
    {
        return view('teacher::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $courseid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($courseid)
    {
        //
    }
}
