<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovedTrainee extends Model
{
    protected $fillable = ['id', 'training_schedule_id', 'applicant_no', 'training_required]'];
}
