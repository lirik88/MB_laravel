<?php

namespace App\Http\Controllers\Admin;

use App\Consumer;
use App\Device;
use App\Devicetype;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevicesController extends Controller
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
	    $devices = Device::all();
	
	    return view('admin.devices.index', compact('active_user','devices' ));
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
	    
	    $consumers = Consumer::select('name', 'object_name', 'id')->get()
		    ->mapWithKeys(function($i) {
			    return [$i->id => $i->name.' '.$i->object_name];
		    });
	    $devicetypes = Devicetype::select('name', 'interval_of_muster', 'min_limit', 'max_limit', 'id')->get()
		    ->mapWithKeys(function($i) {
			    return [$i->id => $i->name.' (ми:'.$i->interval_of_muster.')-('.$i->min_limit.'...'.$i->max_limit.')'];
		    });
	    
	    return view('admin.devices.create',
		    compact('active_user', 'consumers', 'devicetypes'));
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
		    'consumer_id' => 'required',
		    'devicetype_id' => 'required',
		    'number' => 'required',
		    'last_date' => 'required'
	    ]);
	    Device::add($request->all());
	    return redirect()->route('devices.index');
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
	    $device = Device::find($id);
	
	    $consumers = Consumer::select('name', 'object_name', 'id')->get()
		    ->mapWithKeys(function($i) {
			    return [$i->id => $i->name.' '.$i->object_name];
		    });
	    $devicetypes = Devicetype::select('name', 'interval_of_muster', 'min_limit', 'max_limit', 'id')->get()
		    ->mapWithKeys(function($i) {
			    return [$i->id => $i->name.' (ми:'.$i->interval_of_muster.')-('.$i->min_limit.'...'.$i->max_limit.')'];
		    });
	
	    return view('admin.devices.edit',
		    compact('active_user','device', 'consumers', 'devicetypes'));
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
		    'consumer_id' => 'required',
		    'devicetype_id' => 'required',
		    'number' => 'required',
		    'last_date' => 'required'
	    ]);
	
	    $device = Device::find($id);
	
	    $device->update($request->all());
	    return redirect()->route('devices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    Device::find($id)->delete();
	    return redirect()->route('devices.index');
    }
    
    
}
