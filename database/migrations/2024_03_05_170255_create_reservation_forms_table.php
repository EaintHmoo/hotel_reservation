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
        Schema::create('reservation_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->longText('address');
            $table->string('zip_code');
            $table->string('city');
            $table->string('state');
            $table->string('email');
            $table->string('phone');
            $table->dateTime('check_in_date');
            $table->dateTime('check_out_date');
            $table->string('check_in_time')->nullable();
            $table->string('check_out_time')->nullable();
            $table->integer('num_of_adults')->nullable();
            $table->integer('num_of_children')->nullable();
            $table->integer('num_of_rooms')->nullable();
            $table->longText('special_instructions')->nullable();
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
        Schema::dropIfExists('reservation_forms');
    }
};
