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
        Schema::create('careers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('job_title'); // Job title (e.g. "Software Engineer")
            $table->string('job_title_ar'); // Arabic translation of job title
            $table->string('emai_careers'); // Email address related to careers
            $table->integer('status'); // Use 'integer' instead of 'int'
            $table->text('job_skills'); // Required job skills
            $table->text('job_skills_ar'); // Arabic translation of required job skills
            $table->text('job_description'); // Job description in English
            $table->text('job_description_ar'); // Job description in Arabic
            $table->foreignId('created_userID') // Foreign key for user
                ->nullable() // Nullable in case there is no associated user
                ->constrained('users', 'id') // Points to the 'users' table
                ->nullOnDelete() // Set to null if the associated user is deleted
                ->nullOnUpdate(); // Set to null if the associated user is updated
            $table->timestamps(); // Created at & Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers'); // Drops the 'careers' table if it exists
    }
};
