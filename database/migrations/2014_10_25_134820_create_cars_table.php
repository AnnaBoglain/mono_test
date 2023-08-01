<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('stamp');
            $table->string('model');
            $table->string('body_color');
            $table->string('state_number');
            $table->boolean('status');
            $table->unsignedBigInteger('user_id')->nullable();

            $table->softDeletes();
            $table->index('user_id', 'car_user_idx');

            $table->foreign('user_id', 'car_user_fk')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
