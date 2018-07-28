<?php

namespace App\Http\Controllers\ifa;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class PartiallyCompleted extends Controller
{
    public function viewPartiallyCompleted(){
    	$getListValue = DB::table('tbl_ifa_registrations')
    						->where('application_status',2)
                            // ->orderBy('id_organization','DESC')
                            ->paginate(25);
    	return view('ifa.partialty_completed.partialtyCompleteList',compact('getListValue'));
    }
}
