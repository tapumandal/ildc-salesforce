<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\ManagementSetting\ApplicantTraining;
class ApprovedTrainee extends Model
{
    protected $fillable = ['id', 'training_schedule_id', 'applicant_no', 'training_required]'];

    public function trainee(){
        return $this->hasOne(ApplicantTraining::class, 'application_no', 'applicant_no');
    }
}
