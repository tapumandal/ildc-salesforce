<?php

namespace App\Http\Controllers\ManagementSetting;

use App\ApprovedTrainee;
use App\Model\ManagementSetting\ApplicantTraining;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicantTrainingManagement extends Controller
{
    public function applicantList($appStatus){
        return ApplicantTraining::orderBy('pre_addr_ps_id', 'ASC')->where(strtolower('application_status'), strtolower($appStatus))->get();
    }


    public function setTraineeSchedule(Request $request, $scheduleId)
    {

        foreach ($request->applicant_no as $appNo){
            if(isset($request->training_status[$appNo])) {
                $save = new ApprovedTrainee();
                $save->training_schedule_id = $scheduleId;
                $save->applicant_no = $appNo;
                $save->training_required = isset($request->is_required[$appNo]) ? $request->is_required[$appNo] : 0;
                $save->save();
            }
        }

    }
}
