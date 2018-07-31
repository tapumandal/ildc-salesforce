<?php

namespace App\Http\Controllers\ifa;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\IfaManagement\IfaRegistration;
use App\Model\IfaManagement\FilterOption;
use App\Http\Controllers\Controller;
use App\Model\ManagementSetting\ApplicantTraining;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use Auth;
use DB;

class PartiallyCompleted extends Controller
{
    public function viewPartiallyCompleted(){

    	$getFilterOptionValue = FilterOption::get();

    	$getListValue = DB::table('tbl_ifa_registrations')
                            ->orderBy('ifa_reg_id','DESC')
                            ->paginate(15);                            
    	return view('ifa.partialty_completed.partialtyCompleteList',compact('getListValue','getFilterOptionValue'));
    }

    public function viewApplicationDetails(Request $req){

        $application_details = ApplicantTraining::with('pre_district', 'pre_division', 'per_district', 'per_division', 'nationality_info',
            'bank', 'branch', 'user_type', 'premise_ownership', 'permise_ownership')
            ->where('application_no', $req->application_no)->first();
//        return $application_details;
        return view('ifa.application_deatils',compact('application_details'));
    }

    public function nidVaidate(Request $req){
        ApplicantTraining::where('application_no', $req->application_no)->update(['nid_validation_status' => $req->status]);
        return redirect()->back();
    }

    public function getIfaAllValue(Request $request){
    	return json_encode(IfaRegistration::get());


    }
    public function getIfaFilterValue(Request $request){

		$object = new IfaRegistration();
        if(!empty($request->sortbyValues) && empty($request->selectedOptionValues) && empty($request->formDateValues) && empty($request->toDateValues)){
            $data = $object->orderBy('application_no',$request->sortbyValues)                    
                    ->get();
        }
	 	else if(!empty($request->selectedOptionValues) && empty($request->formDateValues) && empty($request->toDateValues))
        {
            $data = $object->where('application_status',$request->selectedOptionValues)
                    ->orderBy('application_no',(!empty($request->sortbyValues) ? $request->sortbyValues : "ASC"))
                    ->get();
                
        }else if(!empty($request->selectedOptionValues) && !empty($request->formDateValues) && empty($request->toDateValues)){

            $data = $object->whereDate('created_at','>=',date($request->formDateValues))
                    ->whereDate('created_at','<=',Carbon::now()->format('Ymd'))
                    ->where('application_status',$request->selectedOptionValues)
                    ->orderBy('application_no',(!empty($request->sortbyValues) ? $request->sortbyValues : "ASC"))
                    ->get();

        }else if(empty($request->selectedOptionValues) && !empty($request->formDateValues) && !empty($request->toDateValues)){

            $data = $object->whereDate('created_at','>=',date($request->formDateValues))
                    ->whereDate('created_at','<=',date($request->toDateValues))
                    ->orderBy('application_no',(!empty($request->sortbyValues) ? $request->sortbyValues : "ASC"))
                    ->get();
        }else{

    	 	$data = $object->whereDate('created_at','>=',date($request->formDateValues))
    	 			->whereDate('created_at','<=',date($request->toDateValues))
    	 			->where('application_status',$request->selectedOptionValues)
    	 			->orderBy('application_no',(!empty($request->sortbyValues) ? $request->sortbyValues : "ASC"))
    	 			->get();
        }

    	return json_encode($data);
    }
}
