<?php

namespace App\Model\ManagementSetting;

use Illuminate\Database\Eloquent\Model;

class ApplicantTraining extends Model
{
    protected $table = 'tbl_ifa_registrations';
    protected $primaryKey = 'ifa_reg_id';

    protected $fillable = ['ifa_reg_id', 'application_no', 'application_status', 'first_name', 'middle_name',
        'last_name', 'mobile_no', 'email', 'father_name', 'nationality', 'national_id_card_no', 'is_active',
        'is_delete', 'image_ext', 'latest_degree', 'is_job_holder', 'employee_id_no', 'designation', 'is_student',
        'training_status', 'others_nationality', 'others_user_type', 'user_type_id'];
//    protected $fillable = ['ifa_reg_id', 'application_no', 'application_status', 'first_name'];
}
