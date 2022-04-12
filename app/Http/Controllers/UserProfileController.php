<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exercise;
use App\Models\Grades;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "User Profile";
        $user = User::findOrFail(Auth::user()->id);
        $exercises = Grades::query()->join('Exercises', 'exercises.id','=','grades.exercise_id')
            ->where('user_id',Auth::user()->id)
            ->get();

        return view('user',compact('title','user','exercises'));
    }





}

