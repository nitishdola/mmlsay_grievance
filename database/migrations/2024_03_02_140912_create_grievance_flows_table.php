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
        Schema::create('grievance_flows', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('grievance_id', false, true);
            $table->bigInteger('sha_user_id')->nullable();
            $table->bigInteger('isa_user_id')->nullable();
            $table->date('isa_forward_date')->nullable();
            $table->date('isa_resolve_date')->nullable();
            $table->text('isa_remarks')->nullable();
            $table->text('sha_remarks')->nullable();
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grievance_flows');
    }
};
