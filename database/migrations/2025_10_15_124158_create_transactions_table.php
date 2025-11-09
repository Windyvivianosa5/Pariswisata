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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('invoice_number');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('ticket_type');
            $table->date('visit_date');
            $table->integer('visitor_count');
            $table->text('notes')->nullable();
            $table->integer('price');
            $table->string('ticket_status')->default('tersedia');
            $table->string('payment_status')->default('pending');
            $table->integer('gross_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
