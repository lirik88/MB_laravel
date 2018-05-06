<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $active_user_id = 0;
	    $active_user = User::find($active_user_id);
	    $users = User::all();
	
	    return view('admin.users.index', compact('users', 'active_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $active_user_id = 0;
	    $active_user = User::find($active_user_id);
	    
	    return view('admin.users.create', compact('active_user'));
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
		    'name' => 'required',
		    'name_p' => 'required',
		    'email' => 'required|email|unique:users',
		    'password' =>'required'
	    ]);
	    $user = User::add($request->all());
	    $user->generatePassword($request->get('password'));
	    return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	    $active_user_id = 0;
	    $active_user = User::find($active_user_id);
	    $user = User::find($id);
	
	    return view('admin.users.edit', compact('active_user','user' ));
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
	    $user = User::find($id);
	    
	    $this->validate($request, [
		    'name' => 'required',
		    'name_p' => 'required',
		    'email' => [
		    	'required',
			    'email',
			    Rule::unique('users')->ignore($user->id)
		    ]
	    ]);
	
	
	    $user->edit($request->all());
	    $user->generatePassword($request->get('password'));
	    return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    User::find($id)->delete();
	    return redirect()->route('users.index');
    }
}
