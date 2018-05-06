<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function devicetypes()
    {
    	return $this->hasMany(Devicetype::class);
    }
}
