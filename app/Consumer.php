<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Consumer extends Model
{
	use Sluggable;
	
	protected $fillable = [
		'name',
		'object_name',
		'object_address',
		'member_position',
		'member_position_p',
		'member_name',
		'member_name_p',
		'contract_id',
		'contract_number',
		'contract_date',
		'conclusion'
	];
	
    public function devices()
    {
    	return $this->hasMany(Device::class);
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function stamp()
    {
    	return $this->belongsTo(Stamp::class);
    }
    
    public function contract()
    {
    	return $this->belongsTo(Contract::class);
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
		$consumer = new static;
		$consumer->fill($fields);
		$consumer->save();
		
		return $consumer;
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
	
	public function setContractDateAttribute($value)
	{
		if (isset($value)) {
			$date = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
			$this->attributes['contract_date'] = $date;
		}
	}
	
	public function getFormatDate($value)
	{
		if (isset($value)) {
			return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
		}
	}
	
	public function getPhraseForAct($value)
	{
		if (isset($value)) ['', '', ''];
		if ($value == 1) return ['Договором транспортировки газа №',
			'',
			'2 к Договору транспортировки газа №'];
		if ($value == 2) return ['Государственным контрактом транспортировки газа №',
			'',
			'2 к Государственному контракту транспортировки газа №'];
		if ($value == 3) return ['Техническим соглашением о порядке учета газа №',
			' к Договору транспортировки газа от 25/12/2015 №41-НДП',
			'1 к Техническому соглашению №'];
		if ($value == 4) return ['Муниципальным контрактом транспортировки газа №',
			'',
			'2 к Муниципальному контракту транспортировки газа №'];
	}
	
	public function getNameOfContract($value)
	{
		if (isset($value)) '';
		if ($value == 1) return 'Договору';
		if ($value == 2) return 'Государственному контракту';
		if ($value == 3) return 'Техническому соглашению о порядке учета газа к Договору';
		if ($value == 4) return 'Муниципальному контракту';
	}
}
