<?php


namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserUpdateProfileRequest;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSettingController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
      $title = 'User Settings';

      return view('setting',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

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
    public function password()
    {
        $title = 'User Settings';

        return view('password',compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function passwordUpdate(UserPasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $current_password = $user->password;

        if (Hash::check($request->get('old_password'), $current_password)){
            User::query()->where('id',$user->id)->update([
                'password' => bcrypt($request->get('new_password')),
            ]);

            return redirect()->back()->with('success', 'Cập nhật mật khẩu thành công');
        }else{
            return redirect()->back()->with('error', 'Mật khẩu cũ không trùng khớp');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UserUpdateProfileRequest $request, $id)
    {
        $file =$request->file('avatar');
        if (isset($file)){
            $user = User::findOrFail($id);

            $name = time(). '.' . $file->getClientOriginalName();
            User::query()->where('id',$id)->update([
                'name' => $request->get('name'),
                'phone_number' => $request->get('phone_number'),
                'address' => $request->get('address'),
                'avatar' => $name,
            ]);

            $file->storeAs('public/user/avatar',$name);
            if(isset($user->avatar)){
                unlink(storage_path('app/public/user/avatar/'.$user->avatar));
            }

            return redirect(route('my.setting-profile'))
                ->with('success','Cập nhật thành công');
        }else{
            User::query()->where('id',$id)->update([
                'name' => $request->get('name'),
                'phone_number' => $request->get('phone_number'),
                'address' => $request->get('address'),
            ]);

            return redirect(route('my.setting-profile'))
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
}
