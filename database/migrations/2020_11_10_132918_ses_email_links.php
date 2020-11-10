<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SesEmailLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ses_email_links', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->uuid('link_identifier');
            $table->integer('sent_email_id');
            $table->string('original_url');
            $table->string('batch')->nullable();
            $table->boolean('clicked')->default(false);
            $table->integer('click_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ses_email_links');
    }
}
