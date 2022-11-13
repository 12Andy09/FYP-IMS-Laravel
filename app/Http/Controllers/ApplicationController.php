<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Internship;
use App\Models\User;
use App\Enums\ApplicationStatusEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->filled('search')){
            $applications = Application::search($request->search)->orderBy('updated_at', 'DESC')->paginate(10);
        }
        else{
            $applications = Application::orderBy('updated_at', 'DESC')->paginate(10);
            $applications_company = Application::where('application_status','waiting_company')->orderByDESC('updated_at')->paginate(10,['*'],'company');
            $applications_admin = Application::where('application_status','waiting_admin')->orderByDESC('updated_at')->paginate(10,['*'],'admin');
            $applications_doing = Application::where('application_status','doing')->orderByDESC('updated_at')->paginate(10,['*'],'doing');
            $applications_completed = Application::where('application_status','completed')->orderByDESC('updated_at')->paginate(10,['*'],'completed');
        }
        return view('admin.view_student_status')
            // ->with('applications', Application::all());
            ->with('applications', $applications)
            ->with('applications_company', $applications_company, 'message', 'company_changed')
            ->with('applications_admin',$applications_admin, 'success', 'admin_changed')
            ->with('applications_doing',$applications_doing)
            ->with('applications_completed',$applications_completed);
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
        $this->validate($request, [
            'application_details' => 'required',
            'internship_id' => 'required',
        ]);

        DB::table('applications')->insert([
            'user_id' => Auth::user()->id,
            'internship_id' => $request->input('internship_id'),
            'application_details' => $request->input('application_details'),
            'application_status' => ApplicationStatusEnum::WAITING_ADMIN,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('student_dashboard')
            ->with('success', 'Applied for internship, please wait for the respond');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $checkoutGoods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $input = Validator::make($request->all(), [
            'application_status' => 'required',
        ]);
        $input = $request->all();

        $application->update($input);
        
        if($application->application_status == "waiting_admin"){
            return redirect()->route('view_student_status')
                ->with('success', 'Student Status Changed to Waiting for Admin Approval');
        }
        elseif($application->application_status == "doing"){
            return redirect()->route('view_student_status')
                ->with('success', 'Student Status Changed to Ongoing');
        }
        elseif($application->application_status == "completed"){
            return redirect()->route('view_student_status')
                ->with('success', 'Student Status Changed to Completed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Application::find($id)->delete();
        return redirect()->route('view_student_status')
            ->with('success', 'Status rejected');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $id
     * @return \Illuminate\Http\Response
     */
    public function view_status(){

    }

}
