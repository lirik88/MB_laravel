<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
	public function devicetypes()
	{
		return $this->hasMany(Devicetype::class);
	}
}
