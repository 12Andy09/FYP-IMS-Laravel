<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Internship;
use App\Models\InternshipCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentDashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:isStudent');
    }

    public function lists(Request $request)
    {
        if($request->filled('search')){
            $internships = Internship::search($request->search)->orderBy('updated_at', 'DESC')->paginate(10);
        }else{
            $internships = Internship::orderByDESC('updated_at')->paginate(10);
        }

        return view('student.studentDashboard')
            ->with('internships', $internships)
            ->with('categories', InternshipCategory::all());
    }

    public function filterInternshipBasedOnCategory(Request $request, $category_id) {
        if($request->filled('search')){
            $internships = Internship::search($request->search)->where('internship_category_id', $category_id)->orderBy('updated_at', 'DESC')->paginate(10);
        }else{
            $internships = Internship::where('internship_category_id', $category_id)->orderBy('updated_at', 'DESC')->paginate(10);
        }
        
        $current_category_name = InternshipCategory::find($category_id)->category_title;
        return view('student.studentDashboard')
            ->with('internships', $internships)
            ->with('categories', InternshipCategory::all())
            ->with('current_category_name', $current_category_name)
            ->with('search',null);
    }

}