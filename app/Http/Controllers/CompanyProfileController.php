<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class CompanyProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_info = User::find(Auth::user()->id);

        return view('Company.companyProfile.index', ['user_info' => $user_info]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!is_null($id)) {
            (User::find($id) && User::find($id)->role == "company") ? $user_info = User::find($id) : abort(404);
        } else {
            $user_info = User::find(Auth::user()->id);
        }
        return view('Company.companyProfile.index', ['user_info' => $user_info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_info = User::with('company_profile')->find($id);
        return view('Company.companyProfile.edit', ['user_info' => $user_info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::with('company_profile')->find($id);

        $request->validate([
            'name' => 'required',
            'address_latitude' => ['numeric', 'nullable'],
            'address_longtitude' => ['numeric', 'nullable'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($user->email, 'email'), 'email'],
        ]);

        $user->name = $request["name"];
        $user->company_profile->company_overview = $request['company_overview'];
        $user->company_profile->company_whyJoin = $request['company_whyJoin'];
        $user->company_profile->company_address = $request['company_address'];
        $user->company_profile->address_lat = $request['address_latitude'];
        $user->company_profile->address_lon = $request['address_longtitude'];

        //if uploaded profile != null
        if ($request->hasFile('profile')) {
            //delete previous file with different extension
            $previous_file = $user->company_profile->company_photo;
            if ($previous_file != "default_profile.png") {
                $path = public_path('profile/' . $previous_file);
                File::delete($path);
            }

            //store into database
            $profile_file_name = $id . "profile." . $request->file('profile')->extension();
            $user->company_profile->company_photo = $profile_file_name;
            //store files
            $request->file('profile')->storeAs('profile', $profile_file_name);
        }

        $user->push();

        return redirect()->route('company_profile.show', $id)->with('success', 'Profile Edit successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
