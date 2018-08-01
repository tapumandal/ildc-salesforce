@extends('layouts.dashboard')
@section('page_heading','Add Examination Name')
@section('section')
<div class=" col-sm-12 col-sm-offset-0 main_body">

	<!-- <div class="panel-body"> -->
		<div class="col-sm-12">
			<div class="col-sm-2">
				<div class="form-group ">
					<a href="{{route('exam_name_list')}}" class="btn btn-primary ">
					<i class="fa fa-arrow-left"></i> Back</a>
				</div>
			</div>
		</div>
		<div class="col-sm-10 col-sm-offset-1">
			<div class="panel panel-default add_body">
				<div class="panel-body">
					<form action="{{route('exam_name_create_action')}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group add_input{{ $errors->has('name') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">
									<span class="pull-right">Name</span>
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name" value="{{ old('name')  }}" placeholder="Name">

									@if($errors->has('name'))
										<span class="help-block">
											{{ $errors->first('name')}}
										</span>
									@endif
								</div>
							</div>

							<div class="form-group add_input{{ $errors->has('description') ? ' has-error' : ''}}">
								<label class="col-md-4 control-label">
									<span class="pull-right">Description</span>
								</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="description" value="{{ old('description')  }}" placeholder="Description">

									@if($errors->has('description'))
										<span class="help-block">
											{{ $errors->first('description')}}
										</span>
									@endif
								</div>
							</div>


							<div class="form-group add_input">
								<div class="col-md-3 col-md-offset-4">
									<div class="select">
										<select class="form-control" type="select" name="isActive" >
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