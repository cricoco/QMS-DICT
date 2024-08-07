<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string("doc_ref_code");
            $table->string("doc_title");
            $table->string("dmt_incharged")->nullable();
            $table->enum("division", ['N/A','AFD', 'ORD', 'TOD'])->nullable();
            $table->string("process_owner");
            $table->string("status")->default('Active');
            $table->enum(
                "doc_type",
                ['Quality Manual', 'Quality Procedure', 'Quality Procedure Form', 'Quality Policy', 'Operations Manual', 'Quality Objectives','Procedure Manual', 'Form/Template', 'Other']
            );
            $table->enum("request_type", ['Creation','Revision', 'Deletion'])->nullable();
            $table->text("request_reason")->nullable();
            $table->string("requester")->nullable();
            $table->enum("type_intext", ['Internal', 'External'])->nullable();
            $table->date("request_date");
            $table->unsignedInteger("revision_num")->nullable();
            $table->date("effectivity_date");
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
