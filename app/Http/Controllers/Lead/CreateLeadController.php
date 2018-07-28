<?php

namespace App\Http\Controllers\lead;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class CreateLeadController extends Controller
{
    public function viewCreateLeadList(){
    	return view('lead.create_lead.createLeadList');
    }
}
