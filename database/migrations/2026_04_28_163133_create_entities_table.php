<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('number')->unique();

            $table->boolean('is_client')->default(false);
            $table->boolean('is_supplier')->default(false);

            $table->string('nif', 20)->unique();
            $table->string('name');

            $table->string('address')->nullable();
            $table->string('postal_code', 8)->nullable();
            $table->string('city')->nullable();

            $table->foreignId('country_id')
                ->nullable()
                ->constrained('countries')
                ->nullOnDelete();

            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();

            $table->boolean('gdpr_consent')->default(false);
            $table->text('notes')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['is_client', 'is_supplier']);
            $table->index('name');
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entities');
    }
};
