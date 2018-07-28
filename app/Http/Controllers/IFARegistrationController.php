<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;

use App\IFARegistration;

class IFARegistrationController extends Controller {

    public function __construct() {
        
    }

    public function create($application_no = 0, $step = 1) {
        
//        $existing_application_details = '';
//        if($application_no != 0 && $step > 1){
//            $existing_application_details = IFARegistration::find($application_no);
//        }

        $data = [
            'application_no' => $application_no,
            'step' => $step,
//            'existing_application_details' => $existing_application_details,
        ];
        return view('ifa_registration_form.create', $data);
    }

    public function store(Request $request) {
        //echo '<pre>';print_r($request->all());exit;
        $validator_arr = [];
        $application_no = $request->input('application_no');
        $step = $request->input('step');

        if ($step == 1 && $application_no == 0) {
            $validator_arr = [
                'first_name' => 'required|max:90',
                'last_name' => 'required|max:90',
                'mobile_no' => 'required|digits:9',
                'email' => 'required|email',
                'date_of_birth' => 'required',
                'national_id_card_no' => 'required|max:25',
            ];
        }

        Validator::make($request->all(), $validator_arr)->validate();
        
        if($step == 1 && $application_no == 0){
            
            $insert_arr = [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'mobile_no' => $request->input('mobile_no'),
                'email' => $request->input('email'),
                'date_of_birth' => $request->input('date_of_birth'),
                'national_id_card_no' => $request->input('national_id_card_no'),
            ];
            
            $application_no = DB::table('tbl_ifa_registrations')->insertGetId($insert_arr);
        }
        
        return redirect()->route('ifa_registration.create', [$application_no, ++$step]);
    }

}
