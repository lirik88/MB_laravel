<?php

namespace App\Http\Controllers\Admin;

use App\Consumer;
use App\Stamp;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StampsController extends Controller
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
	    $stamps = Stamp::all();
	
	    return view('admin.stamps.index', compact('active_user','stamps' ));
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
	
	    return view('admin.stamps.create',
		    compact('active_user', 'consumers'));
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
		    'act_date' => 'required'
	    ]);
	    Stamp::add($request->all());
	    return redirect()->route('stamps.index');
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
	    $stamp = Stamp::find($id);
	
	    $consumers = Consumer::select('name', 'object_name', 'id')->get()
		    ->mapWithKeys(function($i) {
			    return [$i->id => $i->name.' '.$i->object_name];
		    });
	
	    return view('admin.stamps.edit',
		    compact('active_user','stamp', 'consumers'));
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
		    'act_date' => 'required'
	    ]);
	
	    $stamp = Stamp::find($id);
	
	    $stamp->update($request->all());
	    return redirect()->route('stamps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    Stamp::find($id)->delete();
	    return redirect()->route('stamps.index');
    }
}
