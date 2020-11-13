<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesEmailOpen extends Model
{
    use HasFactory;

    protected $table = 'ses_email_opens';

    protected $guarded = [];
}
