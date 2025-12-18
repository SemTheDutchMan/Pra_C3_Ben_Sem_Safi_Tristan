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

    // koppeling met jouw schools tabel
    $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();

    // naam van het team, je kan bijv. groep 1, groep 2 etc.
    $table->string('name');

    // jouw sporten
    $table->enum('sport', ['voetbal', 'lijmbal']);

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
