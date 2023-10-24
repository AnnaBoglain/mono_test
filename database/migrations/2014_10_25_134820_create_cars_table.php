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
            $table->char('stamp', 255);
            $table->char('model', 255);
            $table->char('body_color', 50);
            $table->char('state_number', 10);
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
