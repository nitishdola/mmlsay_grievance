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
        Schema::create('grievance_attachments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('grievance_flow_id', false, true);
            $table->string('attachment_path');
            $table->softDeletes(); 
            $table->timestamps();

            $table->foreign('grievance_flow_id')->references('id')->on('grievance_flows')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grievance_attachments');
    }
};
