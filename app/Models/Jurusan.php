<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jul 2019 18:38:20 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Jurusan
 * 
 * @property int $j_id
 * @property string $j_nama
 * @property string $j_singkatan
 * @property string $j_jenjang
 * @property \Carbon\Carbon $j_created_at
 * @property \Carbon\Carbon $j_updated_at
 * @property \Carbon\Carbon $j_deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $calon_mahasiswas
 * @property \Illuminate\Database\Eloquent\Collection $jurusan_kuota
 *
 * @package App\Models
 */
class Jurusan extends Eloquent
{
	protected $table = 'jurusan';
	protected $primaryKey = 'j_id';
	public $timestamps = false;

	protected $dates = [
		'j_created_at',
		'j_updated_at',
		'j_deleted_at'
	];

	protected $fillable = [
		'j_nama',
		'j_singkatan',
		'j_jenjang',
		'j_created_at',
		'j_updated_at',
		'j_deleted_at'
	];

	public function calon_mahasiswas()
	{
		return $this->hasMany(\App\Models\CalonMahasiswa::class, 'cm_jurusan_id');
	}

	public function jurusan_kuota()
	{
		return $this->hasMany(\App\Models\JurusanKuotum::class, 'jk_jurusan_id');
	}
}
