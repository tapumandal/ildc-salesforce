@extends('layouts.dashboard')
@section('page_heading','Create Training Schedule')
@section('section')
    <div class=" col-sm-12 col-sm-offset-0 main_body">

        <!-- <div class="panel-body"> -->
        <div class="col-sm-12">
            <div class="col-sm-2">
                <div class="form-group ">
                    <a href="{{route('training_schedule_view')}}" class="btn btn-primary ">
                        <i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default add_body">
                <div class="panel-body">
                    <form action="{{route('create_training_schedule_action')}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <div class="form-group add_input{{ $errors->has('name') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Training Name</span>
                            </label>
                            <div class="col-md-6">
                                <div class="select">
                                    <select class="form-control" type="select" name="training_name_id" >
                                        <option value="">Select Training Name</option>
                                        @foreach($trainingNames as $trainingName)
                                            <option value="{{ $trainingName->id_training_name }}">{{$trainingName->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="form-group add_input{{ $errors->has('name') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Schedule Name</span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="training_schedule_name" value="{{ old('training_schedule_name')  }}" placeholder="Name(optional)">

                                @if($errors->has('name'))
                                    <span class="help-block">
											{{ $errors->first('name')}}
										</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('start_date') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Start date</span>
                            </label>
                            <div class="col-md-6">
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('end_date') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">End date</span>
                            </label>
                            <div class="col-md-6">
                                <input type="date" name="end_date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('start_time') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Start Time</span>
                            </label>
                            <div class="col-md-6">
                                <input type="time" name="start_time" class="form-control">
                            </div>
                        </div>

                        <div class="form-group add_input{{ $errors->has('end_time') ? ' has-error' : ''}}">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">End Time</span>
                            </label>
                            <div class="col-md-6">
                                <input type="time" name="end_time" class="form-control">
                            </div>
                        </div>



                        <div class="form-group add_input">
                            <label class="col-md-4 control-label">
                                <span class="pull-right">Status</span>
                            </label>
                            <div class="col-md-6">
                                <div class="select">
                                    <select class="form-control" type="select" name="is_active" >
                                        <option  value="1" name="isActive" >Active</option>
                                        <option value="0" name="isActive" >Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group add_input">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
@endsection