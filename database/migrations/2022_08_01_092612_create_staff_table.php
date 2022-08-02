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
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('staff_id')->unsigned();
            $table->string('name',255)->nullable();
            $table->string('phone',18)->nullable();
            $table->string('username',255)->nullable();
            $table->string('email',100)->nullable();
            $table->date('datebirth')->nullable();
            $table->integer('country',11)->nullable();
            $table->integer('gender',11)->nullable();
            $table->string('skill',255)->nullable();
            $table->string('category',11)->nullable();
            $table->text('about')->nullable();
            $table->string('image')->nullable();
            $table->string('multi_image')->nullable();
            $table->string('slug',255);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('staff');
    }
};
