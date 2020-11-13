<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesSentEmail extends Model
{
    use HasFactory;

    protected $table = 'ses_sent_emails';

    protected $guarded = [];
}
