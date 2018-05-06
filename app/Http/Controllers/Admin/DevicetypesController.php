<?php

namespace App\Http\Controllers\Admin;

use App\Devicetype;
use App\Type;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevicetypesController extends Controller
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
	    $devicetypes = Devicetype::all();
	
	    return view('admin.devicetypes.index', compact('active_user','devicetypes' ));
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
	    
	    $types = Type::pluck('name', 'id')->all();
	    $units = Unit::pluck('name', 'id')->all();
	
	    return view('admin.devicetypes.create',
		    compact('active_user', 'types', 'units'));
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
		    'type_id' => 'required',
		    'interval_of_muster' => 'required'
	    ]);
	    $devicetype = Devicetype::add($request->all());
	    return redirect()->route('devicetypes.index');
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
	    $devicetype = Devicetype::find($id);
	
	    $types = Type::pluck('name', 'id')->all();
	    $units = Unit::pluck('name', 'id')->all();
	    
	    return view('admin.devicetypes.edit',
		    compact('active_user','devicetype', 'types', 'units'));
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
	    $this->validate($request, [
		    'name' => 'required',
		    'type_id' => 'required',
		    'interval_of_muster' => 'required'
	    ]);
	
	    $devicetype = Devicetype::find($id);
	
	    $devicetype->update($request->all());
	    return redirect()->route('devicetypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    Devicetype::find($id)->delete();
	    return redirect()->route('devicetypes.index');
    }
}
