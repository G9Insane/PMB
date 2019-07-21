<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jul 2019 19:24:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HasilSeleksi
 * 
 * @property int $hs_id
 * @property int $hs_user_id
 * @property int $hs_jurusan_id
 * @property float $hs_matematika
 * @property float $hs_b_indonesia
 * @property float $hs_b_inggris
 * @property float $hs_kejuruan
 * @property float $hs_total
 * @property float $hs_rata
 * @property string $hs_status
 * @property \Carbon\Carbon $hs_created_at
 * @property \Carbon\Carbon $hs_updated_at
 * @property \Carbon\Carbon $hs_deleted_at
 * 
 * @property \App\Models\Jurusan $jurusan
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class HasilSeleksi extends Eloquent
{
	protected $table = 'hasil_seleksi';
	protected $primaryKey = 'hs_id';
	public $timestamps = false;

	protected $casts = [
		'hs_user_id' => 'int',
		'hs_jurusan_id' => 'int',
		'hs_matematika' => 'float',
		'hs_b_indonesia' => 'float',
		'hs_b_inggris' => 'float',
		'hs_kejuruan' => 'float',
		'hs_total' => 'float',
		'hs_rata' => 'float'
	];

	protected $dates = [
		'hs_created_at',
		'hs_updated_at',
		'hs_deleted_at'
	];

	protected $fillable = [
		'hs_user_id',
		'hs_jurusan_id',
		'hs_matematika',
		'hs_b_indonesia',
		'hs_b_inggris',
		'hs_kejuruan',
		'hs_total',
		'hs_rata',
		'hs_status',
		'hs_created_at',
		'hs_updated_at',
		'hs_deleted_at'
	];

	public function jurusan()
	{
		return $this->belongsTo(\App\Models\Jurusan::class, 'hs_jurusan_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'hs_user_id');
	}
}
