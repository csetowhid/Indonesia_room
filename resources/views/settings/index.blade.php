@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-default card-view">
							<div class="panel-heading">
								{{-- <div class="pull-right">
								<br>
									<a href="{{route('all.patients')}}">
										<button class="btn btn-success btn-outline">
									All Patients List
									</button>
									</a>
								</div>
 --}}								<div class="clearfix"></div>
							</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">

								@if ($errors->any())
								    <div class="alert alert-danger">
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
			<form method="POST" action="{{ route('settings.create') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10">Company Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-user"></i></div>
					<input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10">Company Logo</label>
					<div class="input-group">
					<input type="file" name="company_logo" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" >Mobile</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-phone"></i></div>
					<input type="number" class="form-control" name="mobile" placeholder="Enter Mobile" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10">Address</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-home"></i></div>
					<input type="text" class="form-control" name="address" placeholder="Enter Address">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="address">Signature Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-user"></i></div>
					<input type="text" class="form-control" name="signature_name" placeholder="Enter Signature Name" required="">
					</div>
				</div>


				<div class="form-group">
					<label class="control-label mb-10" for="image">Signature Image</label>
					<div class="input-group">
					<input type="file" name="signature_image" required>
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
