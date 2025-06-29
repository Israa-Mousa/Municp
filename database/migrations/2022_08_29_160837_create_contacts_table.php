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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id('name_id');
           $table->string('email')->nullable();
           $table->string('name');
           $table->string('phone');
           $table->string('subject')->nullable();
           $table->text('text')->nullable();
           $table->uuid('city_id')->nullable();
           $table->uuid('area_id')->nullable();
           $table->uuid('address_id')->nullable();
           $table->integer('lang_id')
           ->nullable()->default(1);
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
        Schema::dropIfExists('contacts');
    }
};
