<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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
    public function admin_index()
    {
        //link to index page
        return view('admin.adminIndex')
            ->with('admin', Admin::orderBy('updated_at','DESC')->paginate(10));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */ 
    public function store(Request $request)
    {
        $input = Validator::make($request->all(), [
            'user_id' => 'required',
            'user_name' => 'required',
            'user_role' => 'required',
            'user_schwork' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
        ])->validate();

        $input = $request->all();
        $input['user_id'] = auth()->id();
        Admin::create($input);

        return redirect()->route('admin.adminIndex');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Admin $adminUser)
    {
        return view('admin.edit')
            ->with('adminUser',$adminUser);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function update(Admin $adminUser, Request $request)
    {
        $input = Validator::make($request->all(), [
            'user_id' => 'required',
            'user_name' => 'required',
            'user_role' => 'required',
            'user_schwork' => 'required',
            'user_email' => 'required',
            'user_phone' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->id();

        $adminUser->update($input);

        return redirect()->route('admin.adminIndex')
            ->with('success','User updated');;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        return redirect()->route('admin.adminIndex')
            ->with('success','User deleted');
    }

    // public function view($id)
    // {
    //     $internships = Internship::find($id);
    //     return Inertia::render('Internship_View', ['internships' => $internships]);
    // }
}
