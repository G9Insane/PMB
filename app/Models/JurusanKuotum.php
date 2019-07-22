<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jul 2019 19:24:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class JurusanKuotum
 *
 * @property int $jk_id
 * @property int $jk_jurusan_id
 * @property int $jk_kuota
 * @property \Carbon\Carbon $jk_created_at
 * @property \Carbon\Carbon $jk_updated_at
 * @property \Carbon\Carbon $jk_deleted_at
 *
 * @property \App\Models\Jurusan $jurusan
 *
 * @package App\Models
 */
class JurusanKuotum extends Eloquent
{
	protected $primaryKey = 'jk_id';
	public $timestamps = false;

	protected $casts = [
		'jk_jurusan_id' => 'int',
		'jk_kuota' => 'int'
	];

	protected $dates = [
		'jk_created_at',
		'jk_updated_at',
		'jk_deleted_at'
	];

	protected $fillable = [
		'jk_jurusan_id',
		'jk_kuota',
		'jk_created_at',
		'jk_updated_at',
		'jk_deleted_at'
	];

	public function jurusan()
	{
		return $this->belongsTo(\App\Models\Jurusan::class, 'jk_jurusan_id');
	}


}
