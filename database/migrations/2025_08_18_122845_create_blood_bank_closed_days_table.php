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
        Schema::create('blood_bank_closed_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blood_bank_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->enum('type', ['closedDay', 'apmFullDay'])->default('closedDay');
            $table->string('reason')->nullable();
            $table->timestamps();
            $table->unique(['blood_bank_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_bank_closed_days');
    }
};
