<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Stamp extends Model
{
	use Sluggable;
	
	protected $fillable = [
		'consumer_id',
		'act_date',
		'place_1',
		'number_1',
		'place_2',
		'number_2',
		'place_3',
		'number_3',
		'place_4',
		'number_4',
		'place_5',
		'number_5',
		'place_6',
		'number_6',
		'place_7',
		'number_7',
	];
	
	public function consumer()
	{
		return $this->belongsTo(Consumer::class);
	}
	
	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'act_date'
			]
		];
	}
	
	public function setActDateAttribute($value)
	{
		if ($value != NULL) {
			$date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
			$this->attributes['act_date'] = $date;
		}
	}
	
	public function getFormatDate($value)
	{
		if ($value != NULL) {
			return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
		}
	}
	
	public static function add($fields)
	{
		$stamp = new static;
		$stamp->fill($fields);
		$stamp->save();
		
		return $stamp;
	}
	
	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}
	
	public function remove()
	{
		$this->delete();
	}
}
