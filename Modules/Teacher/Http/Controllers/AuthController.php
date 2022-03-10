<?php


namespace Modules\Teacher\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Modules\Teacher\Http\Requests\LoginRequest;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::guard('teacher')->attempt($credentials)) {
            // Authentication passed...
            return Redirect::back()->withErrors(['auth' => 'Invalid username or password *']);

        }
        return redirect()->intended(route('teacher.home'));


    }
    public function showLogin()
    {
        return view('teacher::login');
    }

    public function logout()
    {
       Auth::guard('teacher')->logout();

       return redirect(route('teacher.showLogin'));
    }
}
