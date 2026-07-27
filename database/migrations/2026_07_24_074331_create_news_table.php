<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('content');
            $table->text('excerpt')->nullable();
            $table->string('featured_image', 255)->nullable();
            $table->enum('category', ['kegiatan', 'pengumuman', 'artikel', 'lainnya'])->default('artikel');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->foreignId('author_id')->nullable()->constrained('admin_users')->nullOnDelete();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
