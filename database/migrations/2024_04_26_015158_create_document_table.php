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
        Schema::create('document', function (Blueprint $table) {
            $table->id('drf_no');
            $table->string('doc_ref_code');
            $table->string('request_type');
            $table->string('doc_type');
            $table->string('rev_no');
            $table->string('doc_title');
            $table->string('division');
            $table->string('req_reason');
            $table->string('requester');
            $table->date('request_date');
            $table->string('position');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('division_id');
            $table->string('dmt_incharged');
            $table->string('process_owner');
            $table->string('status');
            $table->string('drf_upload');
            $table->string('file_upload');
            $table->string('new_rev_no');
            $table->date('effectivity_date');
            $table->unsignedBigInteger('history_id');
            $table->timestamps();

            $table->foreign('unit_id')->references('unit_id')->on('units');
            $table->foreign('division_id')->references('division_id')->on('divisions');
            $table->foreign('history_id')->references('history_id')->on('history');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document');
    }
};
