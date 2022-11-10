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
    public function index()
    {
        //link to index page
        return view('admin.view_student_status')
            ->with('applications', Application::all());
            // ->with('applications', Application::orderBy('updated_at', 'DESC')->paginate(10));
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
        //
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
        return redirect()->route('admin.view_student_status')
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
