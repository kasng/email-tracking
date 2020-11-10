<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SesEmailBounces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ses_email_bounces', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('message_id');
            $table->unsignedInteger('sent_email_id');
            $table->string('type');
            $table->string('email');
            $table->dateTime('bounced_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ses_email_bounces');
    }
}
