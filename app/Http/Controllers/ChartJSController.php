<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Internship;
use Illuminate\Support\Facades\DB;

class ChartJSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function Charts(Request $request)
    {
        $applications = Application::select(DB::raw("COUNT(*) as count"), DB::raw("application_status as status_name"))
            ->groupBy(DB::raw("status_name"))
            ->pluck('count', 'status_name');

        $labels = $applications->keys();
        $data = $applications->values();

        $internships = Internship::select(DB::raw("COUNT(*) as count"), DB::raw("internship_category_id as internship_categories"))
            ->groupBy(DB::raw("internship_categories"))
            ->orderBy('internship_category_id', 'ASC')
            ->pluck('count', 'internship_categories');

        $labels2 = $internships->keys();
        $data2 = $internships->values();

        return view('admin.viewReport', compact('labels', 'data', 'labels2', 'data2'));
    }
}
