<?php

namespace App\Http\Controllers\ManagementSetting;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\ManagementSetting\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class ExamSchedule extends Controller
{
    public function viewExamSchedule(){
    	return view('management_setting.exam_schedule.examScheduleList');
    }
}
