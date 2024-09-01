<?php

use App\Models\ProductCategory;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignIdFor(ProductCategory::class)->constrained()->onDelete('restrict');
            $table->decimal('price', 10, 2)->default(0);
            $table->enum('discount_type', ['flat', 'percent'])->nullable();
            $table->decimal('discount_value', 10, 2)->nullable();
            $table->json('images')->nullable();
            $table->integer('stock')->default(0);
            $table->text('short_description')->nullable();
            $table->longText('product_description')->nullable();
            $table->unsignedTinyInteger('rating_star')->nullable();
            $table->unsignedInteger('review_count')->nullable();
            $table->unsignedInteger('sold_count')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
