<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\Course;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GradesController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($courseId,$exerciseId)
    {
        $course = Course::findOrFail($courseId);
        $title = "Exercises Grades";
        $exercises = Exercise::query()->where('course_id', $course->id)->paginate('10');

        return view('teacher::grades.index', compact('title', 'course','exercises'));
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

