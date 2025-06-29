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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('name_ar');
            $table->string('name_buyer');
            $table->string('name_buyer_ar');
            $table->string('number_tenders');
            $table->Text('description');
            $table->Text('description_ar');
            $table->integer('status');
            $table->string('signature');
            $table->foreignId('parentID')->nullable()
                ->constrained('services', 'id')
                ->nullOnDelete()
                ->nullOnUpdate();
            $table->foreignId('created_userID')
                ->nullable()
                ->constrained('users', 'id')
                ->nullOnDelete()
                ->nullOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenders');
    }
};
