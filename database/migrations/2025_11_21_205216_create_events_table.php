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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('price', 8, 2)->default(0.00);
            $table->integer('total_tickets')->default(0);
            $table->integer('available_tickets')->default(0);
            $table->string('image')->nullable();
            $table->string('category');
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->foreignId('organizer_id')->constrained('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
