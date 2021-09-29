@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-right">
								<br>
									<a href="{{route('all.patients')}}">
										<button class="btn btn-success btn-outline">
									All Patients List
									</button>
									</a>
								</div>
								{{-- <div class="pull-left">
									<h6 class="panel-title txt-dark">Add New Patient</h6>
								</div> --}}
								<div class="clearfix"></div>
							</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
			<form method="POST" action="{{ route('patient.create') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10" for="name">Patient Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-user"></i></div>
					<input type="text" class="form-control" name="name" placeholder="Enter Patient Name" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="email">Email address</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
					<input type="email" class="form-control" name="email" placeholder="Enter Email">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10" for="mobile">Mobile</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-phone"></i></div>
					<input type="number" class="form-control" name="mobile" placeholder="Enter Mobile Number">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="address">Address</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-home"></i></div>
					<input type="text" class="form-control" name="address" placeholder="Enter Address">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="address">NIK</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-home"></i></div>
					<input type="text" class="form-control" name="nid" placeholder="Enter NIK Number">
					</div>
				</div>


				<div class="form-group">
					<label class="control-label mb-10" for="age">Birth Date</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-calender"></i></div>
					<input type="date" class="form-control" name="birth_date">
					</div>
				</div>


				<div class="form-group">
					<label class="control-label mb-10">Gender</label>
					<div>
					<div class="radio">
					<input type="radio" name="gender" id="radio_3" value="Male" checked="">
					<label for="yes">Male</label>
					</div>
					<div class="radio">
					<input type="radio" name="gender" id="radio_4" value="Female">
					<label for="no">Female</label>
					</div>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="age">Relative Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="relative_name" placeholder="Enter Relative Name">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10" for="mobile">Relative Mobile</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-phone"></i></div>
					<input type="number" class="form-control" name="relative_mobile" placeholder="Enter Relative Mobile Number">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="image">Photo</label>
					<div class="input-group">
					<input type="file" name="image">
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
