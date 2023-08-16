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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId("author_id")->constrained(table: "users")->onDelete("cascade");
            $table->foreignId("category_id")->nullable()->constrained(table: "categories")->onDelete("set null");
            $table->string("title");
            $table->string("excerpt");
            $table->string("image")->nullable();
            $table->string("caption")->nullable();
            $table->longText("content");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
