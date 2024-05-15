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
        Schema::create('nshs', function (Blueprint $table) {
            $table->id('nsh_id');
            $table->string('email', 30);
            $table->string('password');
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->bigInteger('mobile')->unsigned();
            $table->string('assigned_zone', 30);
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
        Schema::dropIfExists('nshs');
    }
};
