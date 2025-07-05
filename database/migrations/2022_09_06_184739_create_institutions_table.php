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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar');
            $table->Text('location');
            $table->Text('location_ar');
            $table->foreignId('created_userID')
            ->nullable()
            ->constrained('users','id')
            ->nullOnDelete()
            ->nullOnUpdate();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('url')->nullable();
            $table->string('email')->nullable();
                        $table->string('image')->nullable();

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
        Schema::dropIfExists('institutions');
    }
};
