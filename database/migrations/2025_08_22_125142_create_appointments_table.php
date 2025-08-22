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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_id')->unique()->nullable();
            $table->foreignId('donor_id')->constrained()->onDelete('cascade');
            $table->foreignId('blood_bank_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->enum('status', ['in_progress', 'completed', 'canceled', 'expired']);
            $table->timestamps();
            $table->unique(['donor_id', 'blood_bank_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
