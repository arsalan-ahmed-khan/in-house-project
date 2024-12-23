<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_publications', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('paper_title'); // Title of the paper
            $table->string('conference_journal_name'); // Name of the conference or journal
            $table->string('national_international'); // National or international
            $table->year('year_of_publication'); // Year of publication
            $table->string('isbn_issn_no')->nullable(); // ISBN or ISSN number
            $table->string('publisher_name'); // Name of the publisher
            $table->string('indexing')->nullable(); // Indexing information
            $table->string('other')->nullable(); // Any other details
            $table->string('paper_weblink')->nullable(); // Paper web link
            $table->string('doi')->nullable(); // DOI (Digital Object Identifier)
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->timestamps(); // Created at and Updated at columns

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paper_publications');
    }
}
