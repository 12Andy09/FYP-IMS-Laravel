<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;

class CompanyProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:isCompany');
    }

    public function index()
    {
        $user_info = User::find(Auth::user()->id);

        return view('company.companyProfile.index', ['user_info' => $user_info]);
    }

    public function edit($user_id)
    {
        $user_info = User::with('company_profile')->find($user_id);
        return view('company.companyProfile.edit', ['user_info' => $user_info]);
    }

    public function update(Request $request, $user_id)
    {
        $user = User::with('company_profile')->find($user_id);

        $request->validate([
            'name' => 'required',
            'company_id' => ['numeric', Rule::unique('', 'company_id')->ignore($user->company_profile->company_id, 'company_id'), 'nullable'],
            'comp_profile' => 'image',
        ]);

        $user->name = $request['name'];
        $user->company_profile->company_id = $request['company_id'];
        $user->company_profile->company_internship = $request['internship'];
        $user->company_profile->company_about = $request['about'];

        //if uploaded profile != null
        if ($request->hasFile('comp_profile')) {
            //delete previous file with different extension
            $previous_file = $user->company_profile->company_photo;
            $path = public_path('comp_profile/' . $previous_file);
            File::delete($path);

            //store into database
            $profile_file_name = $user_id . "comp_profile." . $request->file('comp_profile')->extension();
            $user->company_profile->company_photo = $profile_file_name;
            //store files
            $request->file('comp_profile')->storeAs('comp_profile', $profile_file_name);
        }
        //if uploaded resume != null
        if ($request->hasFile('internship')) {
            //store into database
            $internship_file_name = $user_id . "internship." . $request->file('internship')->extension();
            $user->company_profile->company_resume = $internship_file_name;
            //store files
            $request->file('internship')->storeAs('internship', $internship_file_name);
        }

        $this->checkProfileComplete($user->company_profile);

        return redirect()->route('company_profile.index')->with('success', 'Profile Edit successfully.');
    }

    private function checkProfileComplete(CompanyProfile $comp_profile)
    {
        $check_complete = true;
        $table = $comp_profile->getTable();
        $all_field = Schema::getColumnListing($table);
        //loop all column and check empty
        for ($index = 0; $index <= 5; $index++) {
            if (empty($profile[$all_field[$index]])) {
                $check_complete = false;
                break;
            }
        }

        if ($check_complete) {
            $comp_profile->profile_complete = "completed";
        } else {
            $comp_profile->profile_complete = "incomplete";
        }
        //save everything
        $comp_profile->push();
    }
}