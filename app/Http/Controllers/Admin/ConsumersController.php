<?php

namespace App\Http\Controllers\Admin;

use App\Consumer;
use App\Contract;
use App\Device;
use App\Stamp;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumersController extends Controller
{
	public function index()
	{
		$active_user_id = 0;
		$active_user = User::find($active_user_id);
		$consumers = Consumer::all();
		
		return view('admin.consumers.index', compact('active_user','consumers'));
    }
	
	public function create()
	{
		$active_user_id = 0;
		$active_user = User::find($active_user_id);
		$contracts = Contract::all()->pluck('name', 'id');

		return view('admin.consumers.create', compact('active_user', 'contracts'));
    }
	
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required'
		]);
		Consumer::create($request->all());
		return redirect()->route('consumers.index');
    }
	
	public function edit($id)
	{
		$active_user_id = 0;
		$active_user = User::find($active_user_id);
		$consumer = Consumer::find($id);
		$contracts = Contract::all()->pluck('name', 'id');
		
		return view('admin.consumers.edit', compact('active_user','consumer', 'contracts'));
    }
	
	public function update(Request $request, $id)
	{
		$this->validate($request, [
			'name' => 'required'
		]);
		
		$consumer = Consumer::find($id);
		$consumer->update($request->all());
		
		return redirect()->route('consumers.index');
    }
	
	public function destroy($id)
	{
		$stamp = Stamp::where('consumer_id', $id)->first();
		$device = Device::where('consumer_id', $id)->first();
		if (isset($device) or isset($stamp)) {
			return redirect()->route('consumers.index');
		} else {
			Consumer::find($id)->delete();
			return redirect()->route('consumers.index');
		}
    }
}
