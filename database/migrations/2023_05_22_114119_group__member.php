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
        Schema::create('Group_Member', function (Blueprint $table) {
            $table->id();
            $table->integer('pengunjung_id')->nullable();
            $table->integer('reservasi_id');
            $table->boolean('Kehadiran')->default(false);
            $table->boolean('feedback')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Group_Member');
    }
};
