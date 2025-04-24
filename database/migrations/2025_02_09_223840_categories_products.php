<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("categories", function (Blueprint $table) {
            $table->uuid('id')->default(Str::uuid());
            $table->text('title')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            $table->primary('id');
        });

        Schema::create("products", function (Blueprint $table) {
            $table->uuid('id')->default(Str::uuid());
            $table->text("title")->nullable();
            $table->text("description")->nullable();
            $table->decimal("price", 10, 2)->nullable();
            $table->text("image")->nullable();
            $table->uuid("category_id");
            $table->text('observation')->nullable();

            $table->foreign("category_id")
                  ->references("id")
                  ->on("categories");

            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
    }
};
