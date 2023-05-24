<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class StudentController extends Controller {
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'matric' => 'required|string|max:255|unique:student',
            'email' => 'required|string|email|max:255|unique:student',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
    
        event(new Registered($user = Student::create([
            'name' => $request->name,
            'matric' => $request->matric,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ])));
    
        return redirect('login')->with('success', 'Registration successful!');
    }  
    public function showProfile(Request $request)
    {
        $email = $request->email;
        $student = Student::where('email', $email)->first();
    
        return view('mainstudent', ['student' => $student]);
    }
}    