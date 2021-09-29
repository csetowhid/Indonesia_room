@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-default card-view">
							
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
			<form method="POST" action="{{URL::to('user/update/'.$users->id)}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10" for="name">Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-user"></i></div>
					<input type="text" class="form-control" id="name" name="name" value="{{$users->name}}">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="email">Email address</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
					<input type="email" class="form-control" id="email" name="email" value="{{$users->email}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10" for="mobile">Mobile</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-phone"></i></div>
					<input type="number" class="form-control" id="mobile" name="mobile" value="{{$users->mobile}}">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="username">User Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-user"></i></div>
					<input type="text" class="form-control" id="username" name="username" value="{{$users->username}}">
					</div>
				</div>
														
				<div class="form-group">
					<label class="control-label mb-10" for="password">Password</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-lock"></i></div>
					<input type="password" class="form-control" id="password" name="password" value="{{$users->password}}">
					</div>
				</div>
				

				<div class="form-group">
					<label class="control-label mb-10" for="usertype">User Type</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<select class="form-control" name="usertype">
					<option>{{$users->usertype}}</option>
					<option>Select</option>
					<option value="Admin">Admin</option>
					<option value="Staff">Staff</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10">Active Status</label>
					<div>
					<div class="radio">
					<input type="radio" name="active_status" id="radio_3" value="{{$users->active_status}}" checked="">
					<label for="yes">Yes</label>
					</div>
					<div class="radio">
					<input type="radio" name="active_status" id="radio_4" value="{{$users->active_status}}" checked="">
					<label for="no">No</label>
					</div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10">Gender</label>
					<div>
					<div class="radio">
					<input type="radio" name="gender" id="radio_3" value="{{$users->gender}}" checked="">
					<label for="yes">Male</label>
					</div>
					<div class="radio">
					<input type="radio" name="gender" id="radio_4" value="{{$users->gender}}" checked="">
					<label for="no">Female</label>
					</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label mb-10" for="image">Photo</label>
					<div class="input-group">
					<input type="file" name="image">
					<img src="{{URL::to($users->image)}}" style="width:70px; height: 70px;">
					<input type="hidden" name="old_image" value="{{$users->image}}">
					</div>
				</div>
											
				<button type="submit" class="btn btn-success mr-10">Update</button>
				
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
					<!-- /Row -->	

@endsection