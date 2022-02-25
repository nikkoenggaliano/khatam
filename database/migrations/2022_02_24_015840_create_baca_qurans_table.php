<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baca_qurans', function (Blueprint $table) {
            $table->id();
            $table->integer('surat_id');
            $table->integer('ayat_id');
            $table->integer('user_id');
            $table->integer('status'); //1 = is active | 0 is inactive (for khatam purpose)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baca_qurans');
    }
};
