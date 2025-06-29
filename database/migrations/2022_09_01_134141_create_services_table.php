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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Text('description');
            $table->string('name_ar');
            $table->Text('description_ar');
            $table->foreignId('parentID')->nullable()
            ->constrained('services','id')
            ->nullOnDelete()
            ->nullOnUpdate();
            $table->foreignId('created_userID')
            ->nullable()
            ->constrained('users','id')
            ->nullOnDelete()
            ->nullOnUpdate();
            $table->string('icon')->nullable();
            $table->string('locale', 5)->default(config('app.locale')); // Language code: AR, EN, FR, ..
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
        Schema::dropIfExists('services');
    }
};
