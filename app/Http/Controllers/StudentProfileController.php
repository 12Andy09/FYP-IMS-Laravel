<?php

namespace App\Http\Controllers;

use App\Models\Student_Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
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
            'student_id' => ['numeric', Rule::unique('student_profile', 'student_id')->ignore($user->student_profile->student_id, 'student_id'), 'nullable'],
            'profile' => 'image',
            'resume' => 'mimes:pdf|max:10000',
        ]);

        $user->name = $request['name'];
        $user->student_profile->student_id = $request['student_id'];
        $user->student_profile->student_education = $request['education'];
        $user->student_profile->student_aboutMe = $request['aboutMe'];

        //if uploaded profile != null
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
        //if uploaded resume != null
        if ($request->hasFile('resume')) {
            //store into database
            $resume_file_name = $user_id . "resume." . $request->file('resume')->extension();
            $user->student_profile->student_resume = $resume_file_name;
            //store files
            $request->file('resume')->storeAs('resume', $resume_file_name);
        }

        $this->checkProfileComplete($user->student_profile);

        return redirect()->route('student_profile.index')->with('edited', 'Profile Edit successfully.');
    }

    private function checkProfileComplete(Student_Profile $profile)
    {
        $check_complete = true;
        $table = $profile->getTable();
        $all_field = Schema::getColumnListing($table);
        //loop all column and check empty
        for ($index = 0; $index <= 5; $index++) {
            if (empty($profile[$all_field[$index]])) {
                $check_complete = false;
                break;
            }
        }

        if ($check_complete) {
            $profile->profile_complete = "completed";
        } else {
            $profile->profile_complete = "incomplete";
        }
        //save everything
        $profile->push();
    }
}
