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
        Schema::create('tourisms', function (Blueprint $table) {
            $table->engine = 'InnoDB';  // Ensure the use of InnoDB for foreign key support

            // Primary columns for the 'tourisms' table
            $table->id();
            $table->string('name');
            $table->string('name_ar');
            $table->text('location');
            $table->text('location_ar');
            $table->text('description');
            $table->text('description_ar');

            // Foreign key referencing the 'users' table (assuming the 'users' table exists)
            $table->foreignId('created_userID')
                ->nullable()
                ->constrained('users', 'id') // Reference to 'users' table's 'id'
                ->nullOnDelete()
                ->nullOnUpdate();

            // Additional columns
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->string('locale', 5)->default(config('app.locale'));

            $table->timestamps();  // Timestamps: created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourisms');  // Drop the 'tourisms' table
    }
};
