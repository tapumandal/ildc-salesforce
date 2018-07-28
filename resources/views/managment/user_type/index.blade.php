@extends('layouts.idlc_aml.division_app')
@section('section')
<div class="panel panel-default col-sm-10 col-sm-offset-1 main_body">
	<div class="header">
		<div class="panel panel-default ">
			<div class="panel-heading">
				<center><h2>User Type List Page</h2></center>
			</div>
		</div>
	</div>

	<div class="panel-body">
		<div class="col-sm-12 col-xs-12 menu">
			<div class="col-sm-2 col-xs-12">
				<div class="form-group ">
					<a href="{{route('userTypes.create')}}" class="btn btn-primary ">Add User Type
					<i class="fa fa-plus"></i></a>
				</div>
			</div>

			    <div class="col-sm-8 form-group">
			        <input type="text" name="searchFld" class="form-control" placeholder="search">			        
			    </div>

			    <div class="col-sm-2">
			    	<button class="btn btn-default" type="button">
			            <i class="fa fa-search"></i>
			        </button>
			    </div>
		</div>

		<div class="col-sm-12">
			<table class="table table-bordered table-striped">
				
				<thead>
				<th width="5%">Serial</th>
				<th width="15%">Nationality</th>
				<th width="15%">Status</th>
				<th width="10%">Action</th>	
				</thead>


				<tbody>
					@php($i =1 )
					@foreach($UserTypeDetails as $UserTypeValue)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$UserTypeValue->user_type}}</td>
							<td>
								{{($UserTypeValue->is_active == 1)? "Active":"Inactive"}}
							</td>
							<td>
								<table>
									<tbody>
										<tr>
											<td >
												<a href="{{route('userTypes.edit',[$UserTypeValue->id_user_type])}}" class="btn btn-success">Edit</a>
											</td>
											<td>
												<form action="{{ route('userTypes.destroy',[$UserTypeValue->id_user_type]) }}" method="POST">
													{!! csrf_field() !!}
													{!! method_field('DELETE') !!}
													<input type="submit" value="Delete" class="btn btn-danger deleteButton">
												</form>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{$UserTypeDetails->links()}}
		</div>
	</div>
</div>
@endsection