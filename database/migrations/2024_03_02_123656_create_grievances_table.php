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
        Schema::create('grievances', function (Blueprint $table) {
            $table->id();
            $table->string('ugn')->unique();
            $table->dateTime('grievance_raise_date');
            $table->string('status');
            $table->string('member_id')->nullable();
            $table->string('enrolled_under_mmlsay');
            $table->string('pan_number');
            $table->string('full_name');
            $table->string('employment_type');
            $table->string('ppo_number')->nullable();
            $table->string('gender');
            $table->string('contact_number');
            $table->bigInteger('district_id', false, true);
            $table->bigInteger('grievance_category_id', false, true);
            $table->text('address');
            $table->string('support_document_path')->nullable();
            $table->string('support_video_path')->nullable();
            $table->softDeletes(); 
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

            $table->foreign('grievance_category_id')->references('id')->on('grievance_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grievances');
    }
};
