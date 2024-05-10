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
        Schema::create('partner', function (Blueprint $table) {
            $table->bigIncrements('partner_id');
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->string('email', 30);
            $table->bigInteger('mobile')->unsigned();
            $table->bigInteger('landline')->unsigned();
            $table->string('job_title', 30);
            $table->string('company_name', 30);
            $table->text('company_address');
            $table->string('company_country', 30);
            $table->string('company_state', 20);
            $table->string('company_city', 20);
            $table->integer('company_zip_code');
            $table->string('company_website', 255);
            $table->bigInteger('company_landline')->unsigned();
            $table->tinyInteger('email_verified')->default(0);
            $table->tinyInteger('admin_verified')->default(0);
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
        Schema::dropIfExists('partner');
    }
};
