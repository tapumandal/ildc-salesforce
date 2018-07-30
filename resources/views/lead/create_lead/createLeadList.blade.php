@extends('layouts.dashboard')
@section('page_heading','Create Lead ')
@section('section')
<div class="row top-body">
    <div class="col-sm-10">
        <div class="form-group col-sm-3" id="error_1">
            <label class="col-sm-4 control-label">Title</label>
                <select class="form-control" id="selectMenuOption">
                    <option value=""> Choose a option</option>
                    <option value="highly_interested"> Highly Interested</option>
                    <option value="might_inves"> Might Inves</option>
                    <option value="might_inves"> Might Inves</option>
                    <option value="not_interested"> Not Interested</option>

                </select>
        </div>

        <div class="form-group col-sm-3 " id="error_2">
            <label class="col-sm-4 control-label">Title </label>
                <select class="form-control" id="selectSortbyValue">
                    <option value="">--Select--</option>
                    <option value="ASC">ASC</option>
                    <option value="DESC">DESC</option>
                </select>
        </div>

        <div class="form-group col-sm-3" id="error_3">
            <label class="col-sm-4 control-label">
                From
            </label>
                <input type="date" name="date[from]" class="form-control" id="formDate">
        </div>

        <div class="form-group col-sm-3" id="error_4">
            <label class="col-sm-4 control-label">To</label>
                <input type="date" name="date[to]" class="form-control" id="toDate">
        </div>

    </div>

    <div class="col-sm-2">
        <div class="pull-left">
            <div class="form-group pull-right" style="padding-top: 25px;">
                <button class="btn btn-primary" id="search_lead">Search</button>
                <button class="btn btn-success" id="reset_btn">Reset</button>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-2">
    <div class="pull-left">
        <a href="{{ route('add_lead_view')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Lead </a>
    </div>      
</div>
<div class="col-sm-10">
    <div class="input-group add-on" style="width:100%;">
        <input class="form-control" placeholder="Search" name="srch-term" id="user_search" type="text">
        <div class="input-group-btn pull-left">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
    </div>
</div>
<br><br>
<div class="col-sm-12">
    <table class="table table-bordered table-striped" id="tblSearch">
        <thead>
            <tr>
                <th class="">Serial</th>
                <th class="">Name</th>
                <th class="">Contact No.</th>
                <th class="">Area</th>
                <th class="">Follow up date</th>
                <th class="">remarks</th>
                <th class="">Action</th>
            </tr>
        </thead>
        <tbody id="lead_list_tbody">
            @php($i=1)
            @foreach($getCreateLead as $leadsValue)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$leadsValue->personal_name}}</td>
                    <td>{{$leadsValue->contact_no}}</td>
                    <td>{{$leadsValue->area}}</td>
                    <td>{{$leadsValue->follow_up_date}}</td>
                    <td>{{$leadsValue->remark_or_comment}}</td>
                    <td>{{$leadsValue->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection