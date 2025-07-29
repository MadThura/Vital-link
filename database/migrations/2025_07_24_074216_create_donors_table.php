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
        Schema::create('donors', function (Blueprint $table) {
            $table->id();

            // Link to users table (email/password etc)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Link to blood bank
            $table->foreignId('blood_bank_id')->nullable()->constrained()->onDelete('cascade');

            // Personal info
            $table->string('fullname');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('DOB');

            // NRC number parts
            $table->string('nrc');

            // Contact info
            $table->string('phone', 20);
            $table->text('address');

            // Blood type
            $table->enum('blood_type', ['A-', 'B-', 'O-', 'AB-', 'A+', 'B+', 'O+', 'AB+']);

            // Donation tracking
            $table->unsignedInteger('donation_count')->default(0);
            $table->timestamp('last_donation_at')->nullable();
            $table->timestamp('cooldown_until')->nullable();

            // Health certificate path
            $table->string('health_certificate')->nullable();

            // Donor status in system
            $table->enum('status', ['pending', 'approved', 'rejected', 'suspended'])->default('pending');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donors');
    }
};
