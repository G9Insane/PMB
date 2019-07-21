<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table,$p='j') {
            $table->bigIncrements($p.'_id');
            $table->string($p.'_nama');
            $table->string($p.'_singkatan');
            $table->string($p.'_jenjang');
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
        Schema::dropIfExists('jurusan');
    }
}
