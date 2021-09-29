@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-right">
								<br>
									
									<a href="{{route('all.medicine')}}">
										<button class="btn btn-success btn-outline">
									All Medicine List
									</button>
									</a>
								</div>
								<div class="clearfix"></div>
							</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
			<form method="POST" action="{{ route('medicine.create') }}">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10" for="patient_name">Medicine Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-pie-chart"></i></div>
					<input type="text" class="form-control" name="medicine_name" placeholder="Enter Medicine Name" required="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10" for="medicine_mg">Medicine Mg</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-ban"></i></div>
					<input type="text" class="form-control" name="medicine_mg" placeholder="Enter Medicine Power" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10 text-left">Description</label>
					<textarea class="form-control" rows="5" spellcheck="true" name="description"></textarea>
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