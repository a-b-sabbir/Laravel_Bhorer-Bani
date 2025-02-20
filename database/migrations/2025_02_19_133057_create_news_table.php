<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->nullable();
            $table->string('splash')->nullable();
            $table->enum('type', ['Breaking', 'Regular', 'Headline']);
            $table->string('meta', 256)->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('headline');
            $table->string('subtitle')->nullable();
            $table->string('category')->nullable();
            $table->text('content');
            $table->timestamp('date')->useCurrent();
            $table->foreignId('reporter_id')->constrained('users')->onDelete('cascade');
            $table->timestamp('published_at')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->enum('status', ['Draft', 'Pending Approval', 'Published', 'Rejected'])->default('Draft');
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};