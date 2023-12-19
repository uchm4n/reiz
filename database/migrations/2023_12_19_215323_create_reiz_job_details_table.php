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
        Schema::create('reiz_job_details', function (Blueprint $table) {
            $table->id();
            $table->text('data')->nullable(false);

            // $table->unsignedBigInteger('reiz_job_id');
            $table->foreignId('reiz_job_id')
                ->references('id')->on('reiz_jobs')
                ->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reiz_job_details');
    }
};
