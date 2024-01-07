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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->integer('pengunjung_id');
            $table->string('how_they_know');
            $table->string('knowledge_before_xev');
            $table->string('knowledge_after_xev');
            $table->string('knowledge_increases');
            $table->string('knowledge_other')->nullable();
            $table->string('content_opinion');
            $table->string('reason_opinion');
            $table->string('presenter_score');
            $table->string('reason_score');
            $table->string('xev_center_facility');
            $table->string('reason_xev_center_facility');
            $table->string('interested_to_buy');
            $table->string('car_series')->nullable();
            $table->string('car_type')->nullable();
            $table->string('reason_xev_center_is_worth');
            $table->string('testimoni');
            $table->string('advice');
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
        Schema::dropIfExists('feedback');
    }
};
