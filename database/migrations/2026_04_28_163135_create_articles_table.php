<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('reference')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2)->default(0);

            $table->foreignId('vat_rate_id')
                ->nullable()
                ->constrained('vat_rates')
                ->nullOnDelete();

            $table->string('photo_path')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index('name');
            $table->index('reference');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
