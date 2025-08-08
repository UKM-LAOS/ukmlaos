<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Add new columns if they don't exist
            if (!Schema::hasColumn('blogs', 'status')) {
                $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->after('is_unggulan');
            }
            if (!Schema::hasColumn('blogs', 'author_id')) {
                $table->foreignId('author_id')->nullable()->constrained('users')->after('divisi_id');
            }
            if (!Schema::hasColumn('blogs', 'views')) {
                $table->unsignedInteger('views')->default(0)->after('status');
            }
            if (!Schema::hasColumn('blogs', 'meta_description')) {
                $table->text('meta_description')->nullable()->after('konten');
            }
            if (!Schema::hasColumn('blogs', 'published_at')) {
                $table->timestamp('published_at')->nullable()->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['status', 'author_id', 'views', 'meta_description', 'published_at']);
        });
    }
};
