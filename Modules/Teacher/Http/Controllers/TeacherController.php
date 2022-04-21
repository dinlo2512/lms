<?php

namespace Modules\Teacher\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Teacher\Http\Requests\TeacherAccountRequest;
use Modules\Teacher\Http\Requests\TeacherPasswordRequest;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.teacher');
        $this->middleware('checkrole');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title = "Home";
        return view('teacher::index', compact('title'));
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
    public function show($id=null)
    {
        $title = "Teacher Setting";
        return view('teacher::setting.index', compact('title'));
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
    public function update(TeacherAccountRequest $request, $id)
    {
        $file =$request->file('avatar');
        if (isset($file)){
            $teacher = Teacher::findOrFail($id);

            $name = time(). '.' . $file->getClientOriginalName();
            Teacher::query()->where('id',$id)->update([
                'name' => $request->get('name'),
                'phone_number' => $request->get('phone_number'),
                'address' => $request->get('address'),
                'avatar' => $name,
                'date_of_birth' => $request->get('date_of_birth'),
            ]);

            $file->storeAs('public/admin/avatar',$name);
            if(isset($teacher->avatar)){
                unlink(storage_path('app/public/admin/avatar/'.$teacher->avatar));
            }

            return redirect(route('teacher.showTeacher'))
                ->with('success','Cập nhật thành công');
        }else{
            Teacher::query()->where('id',$id)->update([
                'name' => $request->get('name'),
                'phone_number' => $request->get('phone_number'),
                'address' => $request->get('address'),
                'date_of_birth' => $request->get('date_of_birth'),
            ]);

            return redirect(route('teacher.showTeacher'))
                ->with('success','Cập nhật thành công');
        }


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

    public function updatePassword(TeacherPasswordRequest $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $current_password = $teacher->password;

        if (Hash::check($request->get('old_password'), $current_password)){
            Teacher::query()->where('id',$teacher->id)->update([
               'password' => bcrypt($request->get('new_password')),
            ]);

            return redirect()->back()->with('success', 'Cập nhật mật khẩu thành công');
        }else{
            return redirect()->back()->with('error', 'Mật khẩu cũ không trùng khớp');
        }
    }

    public function editPassword()
    {
        $title = "Teacher Setting";
        return view('teacher::setting.password',compact('title'));
    }

}
