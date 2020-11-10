<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SesEmailOpens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ses_email_opens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('sent_email_id');
            $table->string('email');
            $table->string('batch')->nullable();
            $table->uuid('beacon_identifier');
            $table->string('url');
            $table->dateTime('opened_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ses_email_opens');
    }
}
