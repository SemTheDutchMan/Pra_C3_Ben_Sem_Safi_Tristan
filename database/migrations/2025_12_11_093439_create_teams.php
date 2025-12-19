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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();

            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->foreignId('tournament_id')->nullable();

            $table->string('name');
            $table->enum('sport', ['voetbal', 'lijnbal']);
            $table->string('group');
            $table->string('teamsort')->nullable();
            $table->string('referee')->nullable();

            $table->integer('pool')->nullable();
            $table->integer('pool_id')->nullable();
            $table->integer('poulePoints')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
