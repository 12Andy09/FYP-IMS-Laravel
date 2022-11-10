<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\User;
use App\Models\InternshipCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class InternshipsController extends Controller
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
        //link to index page
        return view('internships.index')
            ->with('internships', Internship::orderBy('updated_at', 'DESC')->paginate(10));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return view('internships.create')
            ->with('categories', InternshipCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = Validator::make($request->all(), [
            'job_position' => 'required',
            'job_description' => 'required',
            'job_requirement' => 'required',
            'job_location' => 'required',
            'job_duration' => 'required',
            'internship_category_id' => 'required',
            'company_overview' => 'required',
        ])->validate();

        $input = $request->all();
        $input['user_id'] = auth()->id();
        Internship::create($input);

        return redirect()->route('internships.index');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Internship $internship)
    {
        return view('internships.edit')
            ->with('internship', $internship)
            ->with('categories', InternshipCategory::all());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(Internship $internship, Request $request)
    {
        $input = Validator::make($request->all(), [
            'job_position' => 'required',
            'job_description' => 'required',
            'job_requirement' => 'required',
            'job_location' => 'required',
            'job_duration' => 'required',
            'internship_category_id' => 'required',
            'company_overview' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->id();

        $internship->update($input);

        return redirect()->route('internships.index')
            ->with('success', 'Internship changed');;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Internship::find($id)->delete();
        return redirect()->route('internships.index')
            ->with('success', 'Internship deleted');
    }

    public function view($id)
    {
        $user_id = User::with('student_profile')->find(Auth::user()->id);
        $user_profile_complete = $user_id->student_profile->profile_complete;

        $internship = Internship::find($id);
        return view('internship_view')
            ->with('internship', $internship)
            ->with('user_permit', $user_profile_complete)
            ->with('category', InternshipCategory::find($internship->internship_category_id));
    }
}
