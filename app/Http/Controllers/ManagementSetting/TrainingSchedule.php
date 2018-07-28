<?php

namespace App\Http\Controllers\ManagementSetting;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class TrainingSchedule extends Controller
{
    public function viewTrainingSche(){
    	return view('management_setting.training_schedule.trainingScheduleList');
    }
}
