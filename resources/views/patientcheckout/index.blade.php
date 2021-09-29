@extends('master')
@section('content')
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-default card-view">
							<div class="panel-heading">
								
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
					<label class="control-label mb-10">Patient ID</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="patient_id" value="{{$checkins->patient_id}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10">Patient Name</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="patient_name" value="{{$patient_name->patient_name}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10">Room ID</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="room_id" value="{{$checkins->room_id}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10">Check In ID</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="checkin_id" value="{{$checkins->id}}" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label mb-10">Advance Payment</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-people"></i></div>
					<input type="text" class="form-control" name="advance_payment" value="{{$checkins->advance_payment}}" readonly>
					</div>
				</div>
				<div class="form-group">
				<label class="control-label mb-10" for="swab_test_type">Swab Test Type</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-layers"></i></div>
					<select class="form-control" name="swab_test_type" required="">
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
					<div class="input-group-addon"><i class="icon-layers"></i></div>
					<select class="form-control" name="swab_test_result">
					<option>Select</option>
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
					<input type="datetime-local" class="form-control" name="checkout_date" required="">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label mb-10 text-left">Doctor / Manager Clearance Note</label>
					<textarea class="form-control" rows="5" spellcheck="true" name="note"></textarea>
				</div>
				
				<div class="form-group">
					<label class="control-label mb-10">Meal Cost</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-wallet"></i></div>
					<input type="text" class="form-control" name="meal_cost" value="{{$meal_total_cost}}" readonly>
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label mb-10">Medical Report Cost</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-wallet"></i></div>
					<input type="text" class="form-control" name="report_cost" value="{{$report_cost}}" readonly>
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label mb-10">Medicine Cost</label>
					<div class="input-group">
					<div class="input-group-addon"><i class="icon-wallet"></i></div>
					<input type="text" class="form-control" name="medicine_cost" value="{{$medicine_cost}}" readonly>
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