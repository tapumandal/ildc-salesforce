<?php

namespace App\Http\Controllers\salesAgent;

use App\Http\Controllers\Message\ActionMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class BulkUploadController extends Controller
{
    public function bulkUploadView(){
    	return view('sales_agent.bulk_upload.viewBulkUpload');
    }

    public function storeBulk(){
    	return view('sales_agent.bulk_upload.viewBulkUpload');
    }
}
