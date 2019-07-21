<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalonMahasiswaTable extends Migration
{
    public function up()
    {
        Schema::create('calon_mahasiswa', function (Blueprint $table,$p='cm') {
            $table->bigIncrements($p.'_id');
            $table->string($p.'_nisn');
            $table->string($p.'_nama');
            $table->enum($p.'_jk',['L','P']);
            $table->date($p.'_tanggal_lahir');
            $table->string($p.'_no_telp');
            $table->text($p.'_alamat');
            $table->string($p.'_sekolah_asal');
            $table->string($p.'_jurusan_sma');
            $table->string($p.'_tahun_lulus');
            $table->string($p.'_pendidikan_terakhir');
            $table->string($p.'_nama_ibu');
            $table->unsignedBigInteger($p.'_jurusan_id');
            $table->foreign($p.'_jurusan_id')->references('j_id')->on('jurusan')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger($p.'_user_id');
            $table->foreign($p.'_user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp($p.'_created_at')->useCurrent();
            $table->timestamp($p.'_updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable();
            $table->softDeletes($p.'_deleted_at')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('calon_mahasiswa');
    }
}
