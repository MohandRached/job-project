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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // المتقدّم
            $table->foreignId('job_id')->constrained()->onDelete('cascade');  // الوظيفة
            $table->string('video_path')->nullable(); // رابط أو مسار الفيديو المرفوع
            $table->text('note')->nullable();         // ملاحظات أو رسالة مرفقة
            $table->timestamps();

            $table->unique(['user_id', 'job_id']); // كل مستخدم يقدم مرة واحدة على نفس الوظيفة
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
