<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();                 // Auto-increment primary key
            $table->string('title');      // Post title
            $table->text('body');         // Post body/content
            $table->string('status')->default('draft'); // Optional status column
            $table->timestamps();         // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
