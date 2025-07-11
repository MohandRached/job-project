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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // المستخدم (طالب الوظيفة)
            $table->foreignId('job_id')->constrained()->onDelete('cascade');  // الوظيفة
            $table->timestamps();

            $table->unique(['user_id', 'job_id']); // عدم تكرار نفس الوظيفة كمفضلة لنفس المستخدم
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
