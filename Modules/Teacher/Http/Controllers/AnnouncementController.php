<?php


namespace Modules\Teacher\Http\Controllers;

use App\Models\Announcement;
use App\Models\Course;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Teacher\Http\Requests\CreateAnnouncementRequest;
use Modules\Teacher\Http\Requests\CreateAnnouncementTableRequest;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.teacher');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($courseId)
    {
        $title = "Announcements";
        $course = Course::findOrFail($courseId);
        $announcements = Announcement::query()->where('course_id', $course->id)->paginate(4);
        return view('teacher::announcements.index',compact('title','course','announcements'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($courseId)
    {
        $title = "Announcement Create";
        $course = Course::findOrFail($courseId);
        return view('teacher::announcements.create', compact('title','course'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateAnnouncementRequest $request, $courseId)
    {
        $course = Course::findOrFail($courseId);

        Announcement::query()->create([
           'content' => $request->get('content'),
           'title' => $request->get('title'),
            'course_id' => $course->id,
        ]);

        return redirect(route('teacher.announcements.index', $course->id))
            ->with('success', 'Thêm thông báo thành công');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

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
    public function destroy($courseId,$announcementId)
    {
        $course = Course::findOrFail($courseId);
        $announcement = Announcement::findOrFail($announcementId);
        Announcement::query()->where('id',$announcement->id )->delete();

        return redirect(route('teacher.announcements.index', $course->id))
            ->with('success', 'Xóa thông báo thành công');
    }
}
