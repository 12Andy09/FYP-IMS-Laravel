<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:isStudent');
    }

    public function index()
    {
        $user_info = User::find(Auth::user()->id);

        return view('Student.studentProfile.index', ['user_info' => $user_info]);
    }

    public function edit($user_id)
    {
        $user_info = User::with('student_profile')->find($user_id);
        return view('Student.studentProfile.edit', ['user_info' => $user_info]);
    }

    public function update(Request $request, $user_id)
    {
        $request->validate([
            'name' => 'required',
            'student_id' => 'numeric|required',
            //'image' => ['required', 'mimes:png,jpg,jpeg', 'max:5048']
        ]);

        $user = User::with('student_profile')->find($user_id);
        $user->name = $request['name'];
        $user->student_profile->student_id = $request['student_id'];
        $user->push();

        return redirect()->route('student_profile.index');
    }
}
