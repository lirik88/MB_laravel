<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'name_p', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function consumers()
    {
    	return $this->hasMany(Consumer::class);
    }
    
    public static function add($fields)
    {
    	$user = new static;
    	$user->fill($fields);
    	$user->password = bcrypt($fields['password']);
    	$user->save();
    	
    	return $user;
    }
	
	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}
	
	public function generatePassword($password)
	{
		if ($password != null) {
			$this->password = bcrypt($password);
			$this->save();
		}
	}
	
	public function remove()
	{
		$this->delete();
	}
}
