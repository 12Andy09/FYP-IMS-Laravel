<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

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
        $user = User::with('student_profile')->find($user_id);

        $request->validate([
            'name' => 'required',
            'student_id' => ['numeric', Rule::unique('student_profile', 'student_id')->ignore($user->student_profile->student_id, 'student_id')],
            'profile' => 'image',
        ]);

        $user->name = $request['name'];
        $user->student_profile->student_id = $request['student_id'];

        //if profile != null
        if ($request->hasFile('profile')) {
            //delete previous file with different extension
            $previous_file = $user->student_profile->student_photo;
            $path = public_path('profile/' . $previous_file);
            File::delete($path);

            //store into database
            $profile_file_name = $user_id . "profile." . $request->file('profile')->extension();
            $user->student_profile->student_photo = $profile_file_name;
            //store files
            $request->file('profile')->storeAs('profile', $profile_file_name);
        }
        $user->student_profile->student_resume = "";
        $user->push();

        return redirect()->route('student_profile.index')->with('success', 'Profile Edit successfully.');
    }
}
