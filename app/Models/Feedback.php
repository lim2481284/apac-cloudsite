<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $guarded = ['id'];


    # CONST 
    CONST CONTACT = 1;
    CONST QUOTE = 2;
}
