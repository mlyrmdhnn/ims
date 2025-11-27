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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('notification_id')->unique();
            $table->boolean('isRead')->default(false);
            $table->foreignId('from')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('to')->constrained('users', 'id')->onDelete('cascade');
            $table->string('title');
            $table->text('desc');
            $table->string('isAproved')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
