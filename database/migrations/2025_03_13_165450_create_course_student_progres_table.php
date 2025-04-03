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
        Schema::create('course_student_progres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_chapter_lesson_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_current')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_student_progres');
    }
};
