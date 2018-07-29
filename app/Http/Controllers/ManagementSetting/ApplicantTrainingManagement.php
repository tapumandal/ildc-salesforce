<?php

namespace App\Http\Controllers\ManagementSetting;

use App\ApprovedTrainee;
use App\Model\IfaManagement\IfaRegistration;
use App\Model\ManagementSetting\ApplicantTraining;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\ManagementSetting\TrainingSchedule;
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

                $this->applicantTrainingStatus($appNo, 'InTraining');
            }
        }

        return true;

    }

    public function applicantTrainingStatus($applicationNo, $status){

        return IfaRegistration::where('application_no', $applicationNo)->update(['training_status' => $status]);
    }

    public function scheduleTraineeView(Request $req){

        $trainees = ApprovedTrainee::with('trainee')->where('training_schedule_id', $req->schedule_id)->get();
        $schedule = TrainingSchedule::with('trainingName')->where('id', $req->schedule_id)->first();

        return view('management_setting.training_schedule.trainee_list', compact('trainees', 'schedule'));
    }

    public function traineeRemove(Request $req){
        ApprovedTrainee::where('applicant_no', $req->application_no)->where('training_schedule_id', $req->schedule_id)->delete();
        ApplicantTraining::where('application_no', $req->application_no)->update(['training_status' => 'Cancle']);
        return redirect()->back();
    }
}
