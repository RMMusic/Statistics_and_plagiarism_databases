<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkModel extends Model
{
    protected $table = 'works';

    protected $fillable = [
        'participant_id',
        'job_type_id',
        'start_date',
        'end_date',
        'work_type_id',
        'work_status_id',
        'plagiarism_percent',
        'errors_percent',
        'comments'
    ];

    public function getParticipant()
    {
        return $this->hasOne('App\ParticipantsModel', 'id', 'participant_id');
    }

    public function getWorkType()
    {
        return $this->hasOne('App\WorkTypeModel', 'id', 'work_type_id');
    }

    public function getWorkStatus()
    {
        return $this->hasOne('App\WorkStatusModel', 'id', 'work_status_id');
    }
}