<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SesSentEmails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ses_sent_emails', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('message_id');
            $table->string('email');
            $table->string('batch')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->boolean('complaint_tracking')->default(false);
            $table->boolean('delivery_tracking')->default(false);
            $table->boolean('bounce_tracking')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ses_sent_emails');
    }
}
