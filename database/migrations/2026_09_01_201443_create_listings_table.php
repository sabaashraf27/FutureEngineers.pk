<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->longText('description');

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->nullOnDelete();

            $table->string('type');
            $table->string('company_name')->nullable();
            $table->string('location')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->string('apply_link')->nullable();
            $table->string('thumbnail')->nullable();

            $table->string('status')->default('active');

            $table->timestamps();

            $table->index('type');
            $table->index('status');
            $table->index('deadline');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};