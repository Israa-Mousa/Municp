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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar');
                    $table->string('locale')->default('ar'); // أو nullable إذا ما بدك يكون إلزامي

            $table->Text('introduction');
            $table->Text('introduction_ar');
            $table->Text('description');
            $table->Text('description_ar');
            $table->string('status')->default('nonactive');
            $table->string('image', 500)->nullable();
            $table->string('blogs_banner', 500)->nullable();
            $table->foreignId('created_userID')

            ->nullable()
            ->constrained('users','id')
            ->nullOnDelete()
            ->nullOnUpdate();
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
        Schema::dropIfExists('blogs');
    }
};
