<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('adverse_effect_logs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('effect_id'); // Foreign key column
            $table->string('action'); // Action type
            $table->json('changes')->nullable(); // Changes stored as JSON
            $table->unsignedBigInteger('user_id')->nullable(); // User performing the action
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('effect_id')
                ->references('EffectID')
                ->on('adverse_effects')
                ->onDelete('cascade');
    
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adverse_effect_logs');
    }
};
