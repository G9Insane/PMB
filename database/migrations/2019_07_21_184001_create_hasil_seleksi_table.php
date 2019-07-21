<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHasilSeleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_seleksi', function (Blueprint $table,$p='hs') {
            $table->bigIncrements($p.'id');
            $table->unsignedBigInteger($p.'_user_id');
            $table->foreign($p.'_user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger($p.'_jurusan_id');
            $table->foreign($p.'_jurusan_id')->references('j_id')->on('jurusan')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->decimal($p.'_matematika','3','2');
            $table->decimal($p.'_b_indonesia','3','2');
            $table->decimal($p.'_b_inggris','3','2');
            $table->decimal($p.'_kejuruan','3','2');
            $table->decimal($p.'_total','3','2');
            $table->decimal($p.'_rata','3','2');
            $table->enum($p.'_status',['L','TL']);
            $table->timestamp($p.'_created_at')->useCurrent();
            $table->timestamp($p.'_updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable();
            $table->softDeletes($p.'_deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_seleksi');
    }
}
