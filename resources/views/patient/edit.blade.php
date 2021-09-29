@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="pull-right">
								<br>
									<a href="{{route('all.patients')}}">
										<button class="btn btn-success btn-outline">
									All Patients List
									</button>
									</a>
								</div>
							<div class="panel panel-default card-view">
							
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
			<form method="POST" action="{{URL::to('patient/update/'.$patients->id)}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10" for="last_name">Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-user"></i></div>
					<input type="text" class="form-control" name="name" value="{{$patients->name}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10" for="email">Email address</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
					<input type="email" class="form-control" name="email" value="{{$patients->email}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10" for="mobile">Mobile</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-phone"></i></div>
					<input type="number" class="form-control" name="mobile" value="{{$patients->mobile}}">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="address">Address</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-home"></i></div>
					<input type="text" class="form-control" name="address" value="{{$patients->address}}">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="age">Relative Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="relative_name" value="{{$patients->relative_name}}">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10" for="mobile">Relative Mobile</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-phone"></i></div>
					<input type="number" class="form-control" name="relative_mobile" value="{{$patients->relative_mobile}}">
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label mb-10" for="image">Photo</label>
					<div class="input-group">
					<input type="file" name="image">
				<img src="{{URL::to($patients->image)}}" style="width:70px; height: 70px;">
					<input type="hidden" name="old_image" value="{{$patients->image}}">
					</div>
				</div>
											
				<button type="submit" class="btn btn-success mr-10">Submit</button>
				
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