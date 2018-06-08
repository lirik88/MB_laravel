<?php

namespace App\Http\Controllers\Admin;

use App\Consumer;
use App\Device;
use App\Stamp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActsController extends Controller
{
	public function act_of_control($consumer_id)
	{
		$devices = Device::where('consumer_id', $consumer_id)->get();
		$stamp = Stamp::where('consumer_id', $consumer_id)->first();
		$consumer = Consumer::find($consumer_id);
		$phrases = $consumer->getPhraseForAct($consumer->contract_id);
		
		
		return view('admin.acts.act_of_control', compact('devices', 'consumer', 'stamp', 'phrases'));
    }
	
	public function act_of_stamps($consumer_id)
	{
		$stamps = Stamp::where('consumer_id', $consumer_id)->first();
		$consumer = Consumer::find($consumer_id);
		$nameOfContract = $consumer->getNameOfContract($consumer->contract_id);
		
		return view('admin.acts.act_of_stamps', compact('consumer', 'stamps', 'nameOfContract'));
	}
	
	public function act_of_program($consumer_id)
	{
		
    }
}
