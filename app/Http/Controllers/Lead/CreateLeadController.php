<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Model\Lead\InvestmentActionCreateLead;
use App\Model\ManagementSetting\Occupation;
use App\Http\Controllers\Controller;
use App\Model\Lead\CreateLead;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class CreateLeadController extends Controller
{
    public function viewCreateLeadList(){
        $getCreateLead = DB::table('tbl_investment_action as tia')
                            ->select('tcl.*','tia.name')
                            ->join('tbl_create_lead as tcl','tcl.investment_action_id','tia.id_investment_action')
                            ->orderBy('tcl.id_create_lead','DESC')
                            ->paginate(15);
    	return view('lead.create_lead.createLeadList',compact('getCreateLead'));
    }

    public function addLeadview(){
    	$getOccupation = Occupation::get();
    	$getInvestmentAction = InvestmentActionCreateLead::get();
    	return view('lead.create_lead.add_create_lead',compact('getOccupation','getInvestmentAction'));
    }

    public function editLeadView(){
    	return view('lead.create_lead.edit_create_lead');
    }

    public function storeLead(Request $request){
        $datas = $request->all();
    	$validMessages = [
            'personal_name.required' => 'Name field is required.',
            'contact_no.required' => 'Contact no field is required.',
            'contact_no.numeric' => 'Invalid contact number.',
            'contact_no.min' => 'Minimum 11 digit.',
            'contact_no.regex' => 'Invalid Contact number (01).',
            'area.required' => 'Contact no field is required.',
            'investment_date.required' => 'Date field is required.',
            'investment_action.required' => 'Action field is required.',
            ];
        $validator = Validator::make($datas, 
            [
                'personal_name' => 'required',
                'contact_no' => 'required|numeric|min:11|regex:/(01)[0-9]{9}/',
                'area' => 'required',
                'investment_date' => 'required',
                'investment_action' => 'required',
            ],
            $validMessages
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->input())->withErrors($validator->messages());
        }

        $validationError = $validator->messages();
        $storeleads = new CreateLead();
        $storeleads->user_id = Auth::user()->user_id;
        $storeleads->lead_number = $this->leadUniqueNumber();
        $storeleads->reference_number = $this->referenceNumber();
        $storeleads->lead_type = $request->lead_type;
        $storeleads->personal_name = $request->personal_name;
        $storeleads->contact_no = $request->contact_no;
        $storeleads->email = $request->email;
        $storeleads->area = $request->area;
        $storeleads->occupation_id = $request->occupation;
        $storeleads->investment_name = $request->investment_name;
        $storeleads->investment_type = $request->investment_type;
        $storeleads->follow_up_date = $request->investment_date;
        $storeleads->contact_status = $request->contact_status;
        $storeleads->interest_label = $request->interest_label;
        $storeleads->investment_action_id = $request->investment_action;
        $storeleads->remark_or_comment = $request->remark_or_comment;
        $storeleads->save();

        return \Redirect()->Route('create_lead_view');
    }

    private function leadUniqueNumber(){
        $CountValue = CreateLead::count();
        $organizationId = str_pad($CountValue + 1, 3, 1000, STR_PAD_LEFT);

        return $organizationId;
    }

    private function referenceNumber(){
        $CountValue = CreateLead::count();
        $organizationId = str_pad($CountValue + 1, 3, 1000, STR_PAD_LEFT);
        $number = uniqid().$organizationId ;
        return $number;
    }
}
