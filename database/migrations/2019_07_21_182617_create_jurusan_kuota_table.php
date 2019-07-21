<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurusanKuotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan_kuota', function (Blueprint $table, $p='jk') {
            $table->bigIncrements($p.'_id');
            $table->unsignedBigInteger($p.'_jurusan_id');
            $table->foreign($p.'_jurusan_id')->references('j_id')->on('jurusan')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger($p.'_kuota');
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
        Schema::dropIfExists('jurusan_kuota');
    }
}
