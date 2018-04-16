<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enewsmemberadd;

class Enewsmember extends Model {

	protected $table = 'enewsmember';

	public function hasManyPhoto()
	{
		return $this->hasMany('App\EcmsPhoto', 'userid', 'userid');
	}

	public function hasOneDetail()
	{
		return $this->hasOne('App\Enewsmemberadd', 'userid', 'userid');
	}
}
