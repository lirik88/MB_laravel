<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Devicetype extends Model
{
	use Sluggable;
	
	protected $fillable = ['name',
						   'type_id',
						   'interval_of_muster',
						   'min_limit',
						   'max_limit',
						   'unit_id',];
	
    public function devices()
    {
    	return $this->hasMany(Device::class);
    }
    
    public function type()
    {
    	return $this->belongsTo(Type::class);
    }
    
    public function unit()
    {
    	return $this->belongsTo(Unit::class);
    }
	
	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'name'
			]
		];
	}
	
	public static function add($fields)
	{
		$devicetype = new static;
		$devicetype->fill($fields);
		$devicetype->save();
		
		return $devicetype;
	}
	
	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}
	
	public function remove($devicetype_id)
	{
		$this->delete();
	}
	
	public function getTypeName()
	{
		return ($this->type != null)
			?   $this->type->name
			:   '-';
	}
	
	public function getUnitName()
	{
		return ($this->unit != null)
			?   $this->unit->name
			:   '';
	}
	
	public function getUnitId()
	{
		return ($this->unit != null)
			?   $this->unit->id
			:   null;
	}
	
	public function supInt($unitName)
	{
		$symbols = str_split($unitName);
		$result = '';
		foreach ($symbols as $symbol)
		{
			if(ctype_digit(strval($symbol)))
			{
				$symbol = '<sup>'.$symbol.'</sup>';
			}
			$result.=$symbol;
		}
		return $result;
	}
}
