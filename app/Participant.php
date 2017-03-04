<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public $timestamps = false;

    protected $table = 'participants';

    protected $fillable = [
        'order_id',
        'firstName',
        'lastName',
        'address',
        'phoneNumber',
        'email',
        'token',
        'couple_token',
        'category',
        'is_attend',
        'attend_time',
        'is_gain',
        'gain_time'
    ];

}
