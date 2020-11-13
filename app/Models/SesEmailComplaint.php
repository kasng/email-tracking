<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesEmailComplaint extends Model
{
    use HasFactory;

    protected $table = 'ses_email_complaints';

    protected $guarded = [];
}
