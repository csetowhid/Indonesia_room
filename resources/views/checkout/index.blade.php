@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-right">
								<br>
									{{-- <a href="{{route('all.checkin')}}">
										<button class="btn btn-success btn-outline">
									All Check In List
									</button>
									</a> --}}
								</div>
								<div class="clearfix"></div>
							</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
			<form method="POST" action="{{ route('checkout.create') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label class="control-label mb-10" for="patient_name">Patient Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<select class="form-control" name="patient_id">
					<option>Select</option>
					@foreach($patients as $row)
					<option value="{{$row->id}}">{{$row->name}}</option>
					@endforeach
					</select>
					</div>
				</div>

				<div class="form-group">
				<label class="control-label mb-10" for="swab_test_type">Swab Test Type</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<select class="form-control" name="swab_test_type">
					<option>Select</option>
	<option value="PCR">PCR</option>
	<option value="Antigen">Antigen</option>
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10">Swab Test Date</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-calender"></i></div>
					<input type="datetime-local" class="form-control" name="swab_test_date">
					</div>
				</div>

				<div class="form-group">
				<label class="control-label mb-10">Swab Test Result</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<select class="form-control" name="swab_test_result">
					<option value="0">Select</option>
	<option value="Positive">Positive</option>
	<option value="Reactive">Reactive</option>
	<option value="Negative">Negative</option>
	<option value="Non Reactive">Non Reactive</option>
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10">Upload Swab Test Result</label>
					<div class="input-group">
					<input type="file" name="upload_test_result">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10 text-left">Swab Test Clearance Note</label>
					<textarea class="form-control" rows="5" spellcheck="true" name="test_clearance_note"></textarea>
				</div>

				<div class="form-group">
					<label class="control-label mb-10" for="admit_date">Check Out Date</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-calender"></i></div>
					<input type="datetime-local" class="form-control" name="checkout_date">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10 text-left">Doctor / Manager Clearance Note</label>
					<textarea class="form-control" rows="5" spellcheck="true" name="note"></textarea>
				</div>
				
			{{-- 	<div class="form-group">
					<label class="control-label mb-10" for="advance_payment">Advance Payment</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-phone"></i></div>
					<input type="text" class="form-control" name="advance_payment" placeholder="Enter Advance Payment Money">
					</div>
				</div> --}}			
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