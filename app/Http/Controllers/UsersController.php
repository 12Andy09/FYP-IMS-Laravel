<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
        return view('users.index')
            ->with('users', User::orderBy('updated_at','DESC')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //link to create page
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        // create new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user -> student_profile()->create(['user_id'=>$user->user_id]);


        // redirect to index page
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // // link to show page with user data and category data
        // $user = User::find($id);
        // return view('users.show')
        //     ->with('user',$user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // link to edit page with user data and category data
        $user = User::find($id);
        return view('users.edit')
            ->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request,int $id)
    {
        // validate the data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        // update user
        $query = DB::table('users')
            ->where('id',$id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
 
                'updated_at' => now(),
                // actually it will update this column automatically,
                // but we want to make sure the query is executed,
                // so add it wont give wrong error toast
            ]);

        // if update fail, then redirect to users.index page with error toast
        if(!$query){
            return redirect()->route('users.index')->with('error','Record Added Failed. Please Try Again');
        }


        // redirect to users.show page with success toast
        return redirect()->route('users.index')->with('success',$request->name . ' have been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // remove the User
        User::destroy($id);

        // redirect admin back to the good.index page and prompt a success message
        return redirect()->route('users.index')
            ->with('success','User deleted');
    }
}