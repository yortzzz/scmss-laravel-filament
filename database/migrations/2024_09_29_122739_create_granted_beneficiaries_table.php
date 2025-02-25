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
        Schema::create('granted_beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->string('batch');
            $table->foreignId('payroll_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_claimed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('granted_beneficiaries');
    }
};
