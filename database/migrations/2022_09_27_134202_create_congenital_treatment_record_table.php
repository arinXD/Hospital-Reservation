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
        Schema::create('congenital_treatment_record', function (Blueprint $table) {
            $table->unsignedBigInteger('treatment_record_id');
            $table->unsignedBigInteger('congenital_id')->nullable();
            $table->foreign('treatment_record_id')->references('id')->on('treatment_records')->onDelete('cascade');
            $table->foreign('congenital_id')->references('id')->on('congenitals')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('congenital_treatment_record');
    }
};
