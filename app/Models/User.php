<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jul 2019 19:24:59 +0000.
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
 * @property bool $is_admin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $calon_mahasiswas
 * @property \Illuminate\Database\Eloquent\Collection $hasil_seleksis
 *
 * @package App\Models
 */
class User extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'is_admin' => 'bool'
	];

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
		'remember_token',
		'is_admin'
	];

	public function calon_mahasiswas()
	{
		return $this->hasOne(\App\Models\CalonMahasiswa::class, 'cm_user_id');
	}

	public function hasil_seleksis()
	{
		return $this->hasOne(\App\Models\HasilSeleksi::class, 'hs_user_id')->orderBy('hs_rata');
	}
}
