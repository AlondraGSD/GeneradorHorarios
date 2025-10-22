<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('availability', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');

            $table->string('morning_mo', 10)->nullable();
            $table->string('morning_tu', 10)->nullable();
            $table->string('morning_we', 10)->nullable();
            $table->string('morning_th', 10)->nullable();
            $table->string('morning_fr', 10)->nullable();
            $table->string('morning_sa', 10)->nullable();
            $table->string('morning_su', 10)->nullable();

            $table->string('evening_mo', 10)->nullable();
            $table->string('evening_tu', 10)->nullable();
            $table->string('evening_we', 10)->nullable();
            $table->string('evening_th', 10)->nullable();
            $table->string('evening_fr', 10)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availability');
    }
};
