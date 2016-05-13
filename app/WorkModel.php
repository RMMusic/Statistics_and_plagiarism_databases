<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkModel extends Model
{

    const STATISTICS_ID = 1;
    const PLAGIARISM_ID = 2;

    protected $table = 'works';

    protected $fillable = [
        'participant_id',
        'work_them',
        'job_type_id',
        'start_date',
        'end_date',
        'work_type_id',
        'work_status_id',
        'plagiarism_percent',
        'errors_percent',
        'comments'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * 
     * this function return 'participant name and phone number'
     */
    public function getParticipant()
    {
        return $this->hasOne('App\ParticipantsModel', 'id', 'participant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * 
     * this function return 'job type(statistics or plagiarism)'
     */
    public function getJobType()
    {
        return $this->hasOne('App\ParticipantsModel', 'id', 'job_type_id');
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