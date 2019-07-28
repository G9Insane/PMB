<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 21 Jul 2019 19:24:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CalonMahasiswa
 *
 * @property int $cm_id
 * @property string $cm_nisn
 * @property string $cm_nama
 * @property string $cm_jk
 * @property \Carbon\Carbon $cm_tanggal_lahir
 * @property string $cm_email
 * @property string $cm_no_telp
 * @property string $cm_alamat
 * @property string $cm_sekolah_asal
 * @property string $cm_jurusan_sma
 * @property string $cm_tahun_lulus
 * @property string $cm_pendidikan_terakhir
 * @property string $cm_nama_ibu
 * @property int $cm_jurusan_id
 * @property int $cm_user_id
 * @property \Carbon\Carbon $cm_created_at
 * @property \Carbon\Carbon $cm_updated_at
 * @property \Carbon\Carbon $cm_deleted_at
 *
 * @property \App\Models\Jurusan $jurusan
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class CalonMahasiswa extends Eloquent
{
	protected $table = 'calon_mahasiswa';
	protected $primaryKey = 'cm_id';
	public $timestamps = false;

	protected $casts = ['cm_jurusan_id' => 'int', 'cm_user_id' => 'int'
	];

	protected $dates = ['cm_tanggal_lahir', 'cm_created_at', 'cm_updated_at', 'cm_deleted_at'
	];

	protected $fillable = ['cm_nisn', 'cm_nama', 'cm_jk', 'cm_tanggal_lahir', 'cm_email', 'cm_no_telp',
        'cm_alamat', 'cm_sekolah_asal', 'cm_jurusan_sma', 'cm_tahun_lulus', 'cm_pendidikan_terakhir',
        'cm_nama_ibu', 'cm_jurusan_id', 'cm_user_id'
	];

	public function jurusan()
	{
		return $this->belongsTo(\App\Models\Jurusan::class, 'cm_jurusan_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'cm_user_id');
	}
}
