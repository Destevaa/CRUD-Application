<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'mobile_number'];
}
