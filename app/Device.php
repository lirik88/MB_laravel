<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Device extends Model
{
	use Sluggable;
	
	protected $fillable = [
		'consumer_id',
		'devicetype_id',
		'number',
		'last_date',
		'next_date',
		'note'];
	
    public function consumer()
    {
    	return $this->belongsTo(Consumer::class);
    }
    
	public function devicetype()
	{
		return $this->belongsTo(Devicetype::class);
	}
	
	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'number'
			]
		];
	}
	
	public static function add($fields)
	{
		$device = new static;
		$device->fill($fields);
		$device->next_date = $device->setNextDate($device->last_date,
			$device->devicetype->interval_of_muster);
		$device->save();
		
		return $device;
	}
	
	public function edit($fields, $id)
	{
		$device = Device::find($id);
		$this->fill($fields);
		$this->attributes['next_date'] = $this->setNextDate(
			$this->attributes['last_date'],
			$device->devicetype->interval_of_muster);
		$this->save();
	}
	
	public function remove()
	{
		$this->delete();
	}
	
	public function setLastDateAttribute($value)
	{
		$date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
		$this->attributes['last_date'] = $date;
	}
	
	public function setNextDate($value, $interval)
	{
		$date = Carbon::createFromFormat('Y-m-d', $value)
			->addYear($interval);
		return $date;
	}
	
	public function getFormatDate($value)
	{
		return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
	}
	
	public function getCssAlerts($value)
	{
		if ($value <= date(now())) return 'alert alert-danger';
	}
}
