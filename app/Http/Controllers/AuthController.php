<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Management;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('loginstudent');
    }

    public function doLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            return redirect()->route('mainstudent');
        } else {
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }
    }

    public function Mlogin()
    {
        return view('loginmanagement');
    }
    public function MdoLogin(Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');


    if (Auth::guard('management')->attempt($credentials)) {
        return redirect()->intended('dashboard');
    } else {
        return redirect()->route('loginmanagement')->with('error', 'Invalid email or password.');
    }
}

}

