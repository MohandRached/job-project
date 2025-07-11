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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // الشركة المالكة للوظيفة
            $table->string('title');              // عنوان الوظيفة
            $table->text('description');          // وصف كامل
            $table->string('work_place')->nullable();    // مكان العمل
            $table->string('gender_preference')->nullable(); // تفضيل الجنس (ذكر/أنثى/الكل)
            $table->string('education_level')->nullable();   // المؤهل المطلوب
            $table->string('work_experience')->nullable();   // سنوات الخبرة
            $table->date('from_date')->nullable();  // بداية التقديم
            $table->date('to_date')->nullable();    // نهاية التقديم
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
