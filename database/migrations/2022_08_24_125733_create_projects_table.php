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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Text('introduction');
            $table->Text('description');
            $table->string('name_ar');
            $table->Text('introduction_ar');
            $table->Text('description_ar');
            $table->char('status');
            $table->foreignId('created_userID')
            ->nullable()
            ->constrained('users','id')
            ->nullOnDelete()
            ->nullOnUpdate();
            $table->string('image')->nullable();
            $table->string('locale', 5)->default(config('app.locale')); // Language code: AR, EN, FR, ..
            $table->string('city');
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
        Schema::dropIfExists('projects');
    }
};
