<?php

namespace App\Http\Controllers;
use App\Models\Internship;
use App\Models\InternshipCategory;
use Illuminate\Http\Request;


class InternshipCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allcategory()
    {
        $category = InternshipCategory::where('status','0')->get();
        return response()->json([
            'status'=>200,
            'category'=>$category,
        ]);
    }
}
