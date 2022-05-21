<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
class SiteHomeController extends Controller
{
    public function index()
    {
        $title = "Site Home";
        $user = User::findOrfail(Auth::user()->id);
        $courses = User::query()
            ->join('course_user', 'course_user.user_id', '=', 'users.id')
            ->where('user_id',$user->id )
            ->get();
//        foreach($courses as $course){
//            $announcements = Announcement::query()->where('course_id',$course->course_id)
//            ->orderByDesc('created_at')
//                ->get();
//
//        }

        $notifications = Notification::orderByDesc('created_at')->paginate(5);
        return view('site-home',compact('title','notifications','courses'));
    }
}
