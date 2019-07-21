<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jul 2019 18:38:20 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models
 */
class User extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
}
