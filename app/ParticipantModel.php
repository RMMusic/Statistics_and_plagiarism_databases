<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantModel extends Model
{
    protected $table = 'participants';
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];
}