<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('number')->unique();

            $table->foreignId('entity_id')
                ->constrained('entities')
                ->cascadeOnDelete();

            $table->string('first_name');
            $table->string('last_name')->nullable();

            $table->string('role')->nullable();

            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();

            $table->boolean('gdpr_consent')->default(false);
            $table->text('notes')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index('first_name');
            $table->index('last_name');
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
